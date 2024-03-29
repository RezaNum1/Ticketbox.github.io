<?php

namespace App\Http\Controllers;

use App\EventOwners;
use Illuminate\Http\Request;

class BasePageController extends Controller
{
    public function index_home(Request $request){
        $builds = EventOwners::all();

        return view('backend.index', compact('builds'));
    }

    public function checkin($id){
        $builds = EventOwners::where('id', $id)->get();


        return view('backend.checkin', compact('builds'));
    }

    public function search(Request $request){
        $data = $request->get('builds');

        $builds = EventOwners::where('name', 'LIKE', "%$data%")
            ->orWhere('event_categories', 'LIKE', "%$data%")
            ->paginate(10);

        return view('backend.index', compact('builds'));

    }

    public function concert(){
        $builds = EventOwners::where('event_categories', 'concert')->get();

        return view('backend.concert', compact('builds'));
    }

    public function searchConcert(Request $request){
        $data = $request->get('builds');

        $builds = EventOwners::where('name', 'LIKE', "%$data%")
            ->orWhere('city', 'LIKE', "%$data%")
            ->paginate(10);

        return view('backend.concert', compact('builds'));

    }

    public function seminar(){
        $builds = EventOwners::where('event_categories', 'seminar')->get();

        return view('backend.concert', compact('builds'));
    }

    public function searchSeminar(Request $request){
        $data = $request->get('builds');

        $builds = EventOwners::where('name', 'LIKE', "%$data%")
            ->orWhere('city', 'LIKE', "%$data%")
            ->paginate(10);

        return view('backend.concert', compact('builds'));

    }
}
