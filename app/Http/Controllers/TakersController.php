<?php

namespace App\Http\Controllers;

use App\BookingTicket;
use App\CreditCard;
use App\EventOwners;
use App\Transaction;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TakersController extends Controller
{
    public function index(Request $request){
        $events = EventOwners::all();

        return view('backend.takers.index', compact('events'));
    }

    public function checkin($id){
        $events = EventOwners::where('id', $id)->get();
        $users = Users::where('id', Session::get('id'))->get();

        return view('backend.takers.checkin', compact('events', 'users'));
    }

    public function bookingreq(Request $request){
        $books = BookingTicket::where('customer_id', Session::get('id'))->get();

        return view('backend.takers.bookingreq', compact('books'));
    }


    public function ticketPro(Request $request){

        $data = new BookingTicket();
        $data->customer_id = $request->customer_id;
        $data->owner_id = $request->owner_id;
        $data->event_id = $request->event_id;
        $data->quantity = $request->quantity;
        $data->total_price = (($request->price)*($request->quantity));

        //Random Key For Booking_Code
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < 6; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        $data->ticket_code = $str;
        $data->status = 3;
        $data->save();

        return $this->pay($data);
    }

    public function pay($data){
        $datas = BookingTicket::where('id', $data->id)->get();

        return view('backend.takers.payment', compact('datas'));
    }

    public function payment(Request $request){
        $this->validate($request, [
            'month' => 'required',
            'year' => 'required',
            'security_code' => 'required',
            'name_on_card' => 'required',
            'card_number' => 'required',
        ]);

        $datas = BookingTicket::where('id', $request->booking_id)->get();

        $card_number = $request->card_number;
        $validate = CreditCard::where('card_number',$card_number)->first();

        if(!$validate){
            return redirect()->route('takers.pay')->with('alert', 'Credit Card Not Found!');
        }else{

            $quant = $request->quantity;
            $evid = $request->event_id;
            $eventTicket = EventOwners::where('id', $evid)->first();
            $newstock = (($eventTicket->stock) - $quant);


            if($newstock <= 0){
                return redirect()->route('takers.pay')->with('alert', 'Less Ticket Stock!');
            }
            else{
                $eventTicket->stock = $newstock;


                $data = new Transaction();
                $data->owner_id = $request->owner_id;
                $data->event_id = $request->event_id;
                $data->customer_id = $request->customer_id;
                $data->event_name = $request->event_name;
                $data->total_price = $request->total_price;

                $stat = BookingTicket::where('id', $request->booking_id)->first();
                $stat->status = '4';

                $eventTicket->save();
                $stat->save();
                $data->save();
            }

            return redirect()->route('takers.bookingreq')->with('alert-success', 'Payment Success');
        }
    }

}
