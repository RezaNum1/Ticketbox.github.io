<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function register_takers(Request $request){
        return view('backend.register_takers');
    }

    public function register_takersPro(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5',
            'confirmation' => 'required|same:password',
            'email' => 'required|email',
            'phone' => 'required|min:10',
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->type = 2;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();

        return redirect()->route('auth.login')->with('alert-success', 'Success Join To Ticket Box');
    }

    public function register_owner(Request $request){
        return view('backend.register_owner');
    }

    public function register_ownerPro(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5',
            'confirmation' => 'required|same:password',
            'email' => 'required|email',
            'phone' => 'required|min:10',
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->type = 3;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();

        return redirect()->route('auth.login')->with('alert-success', 'Success Join As Owner');
    }


    public function login(Request $request){
        return view('backend.login');
    }

    public function loginProcess(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = Users::where('username',$username)->first();

        if(!$data || !Hash::check($password, $data->password)){
            return redirect()->route('auth.login')->with('alert', 'Username atau password yang kamu masukkan salah!');
        }

        return $this->authProcess($data);
    }

    public function authProcess($data){
        Session::put('name', $data->name);
        Session::put('username', $data->username);
        Session::put('email', $data->email);
        Session::put('type', $data->type);
        Session::put('id', $data->id);
        Session::put('login', TRUE);

        if($data->type == "admin"){
            return redirect('#');
        }
        else if ($data->type == "2"){
            return redirect()->route('takers.index');
        }
        else if($data->type == "3"){
            return redirect()->route('owners.index');
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('auth.login')->with('alert-success', 'Berhasil keluar!');
    }
}
