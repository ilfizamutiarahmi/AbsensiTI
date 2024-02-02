<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login.index')->with('failed','Email atau Password Salah !!');
        }
    }

    public function logout(){

    }

    public function register(){
        return view('login.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login.index')->with('failed','Email atau Password Salah !!');
        }

    }

    public function dashboard()
    {
        return view('dashboard');

        return abort(403);
    }
}
