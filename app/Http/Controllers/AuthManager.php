<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('authLogin');
    }

    function register(){
        return view("authRegister");
    }

    function loginPost(Request $request){
        $request-> validate([
            'email'=> 'required',
            'password'=>'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()-> intended(route('home'));
        } else {
            return redirect(route('login'))->with('error', 'Login details are not valid');
        }
    }

    function registerPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required'
        ]);
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with('error','Registration failed, try again');
       }
       return redirect(route('login'))->with('success',"Registration success");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
