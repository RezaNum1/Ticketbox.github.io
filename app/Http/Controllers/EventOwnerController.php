<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\EventOwners;
use App\BookingTicket;
use App\EventCategory;

class EventOwnerController extends Controller
{
    public function index(Request $request){

        $events = EventOwners::where('owner_id', Session::get('id'))->get();
        return view('backend.owners.index', compact('events'));
    }

    public function bookingList(Request $request){
        $events = BookingTicket::where('owner_id', Session::get('id'))->get();

        return view('backend.owners.bookingList', compact('events'));
    }

    public function bookingCode(Request $request){
        return view('backend.owners.bookingCode');
    }

    public function create(Request $request){
        $datas = EventCategory::all();
        return view('backend.owners.create', compact('datas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'address' => 'required|min:5',
            'city' => 'required|min:3',
            'description' => 'required|min:5',
            'price' => 'required|min:2',
            'event_categories' => 'required',
            'stock' => 'required',
        ]);


        $data = new EventOwners();
        $data->owner_id = Session::get('id');
        $data->name = $request->input('name');
        $files = $request->file('file');
        $exe = $files->getClientOriginalExtension();
        $newName = rand(100000, 1001238912).".".$exe;
        $files->move('uploads/file', $newName);
        $data->file = $newName;
        $data->event_categories = $request->input('event_categories');
        $data->description = $request->input('description');
        $data->price = $request->input('price');
        $data->stock = $request->input('stock');
        $data->address = $request->input('address');
        $data->city = $request->input('city');
        $data->date = $request->input('date');
        $data->time = $request->input('time');
        $data->save();

        return redirect()->route('owners.index')->with('alert-success', 'Success Add New Event '.$data->name);
    }

    public function edit($id){
        $events = EventOwners::where('id', $id)->get();

        return view('backend.owners.update', compact('events'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required|min:3',
            'city' => 'required|min:3',
            'address' => 'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required|min:2',
        ]);

        $data = EventOwners::where('id', $id)->first();
        $data->owner_id = Session::get('id');
        $data->name = $request->name;
        if(empty($request->file('file'))){
            $data->file = $data->file;
        }
        else{
            unlink('uploads/file/'.$data->file);// menghapus file lama

            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $data->file = $newName;
        }
        $data->city = $request->city;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();

        return redirect()->route('owners.index')->with('alert-success', "Success Update Data Event". $data->name);
    }

    public function detail($id){
        $events = EventOwners::where('id', $id)->get();

        return view('backend.owners.detail', compact('events'));
    }

    public function status(Request $request, $id){
        if(!$request->id){
            return redirect()->back();
        }

        $data = EventOwners::where('id', $id)->first();

        if($data->status == 1){
            $data->status = 0;
        }
        else{
            $data->status = 1;
        }

        $data->save();

        return redirect()->route('owners.index')->with('alert-success', 'Success Change Room Status!');
    }

    public function delete($id){

        $room = EventOwners::findOrFail($id);

        if(!$room->trashed()){
            $room->delete();
            return redirect()->route('owners.index')->with('alert-success', 'Success Delete Room!');
        }
    }

    public function restore(Request $request){
        $room = EventOwners::withTrashed()->findOrFail($request->restore);

        if(!$room->trashed()){
            return redirect()->route('owners.index')->with('alert-success', "Data Cannot to Restore");
        }else{
            $room->restore();
            return redirect()->route('owners.index')->with('alert-success', 'Data Success To Restore');
        }
    }

    public function findCode(Request $request){
        $data = $request->get('findCode');

        $books = BookingTicket::where('ticket_code', 'LIKE', "%$data%")
            ->paginate(10);

        return view('backend.owners.bookingCode', compact('books'));
    }

    public function statChange($id){

        $data = BookingTicket::where('id', $id)->first();
        $data->status = '5';
        $data->save();

        return redirect()->route('owners.bookingCode')->with('alert-success', "Success Get In");
    }
}
