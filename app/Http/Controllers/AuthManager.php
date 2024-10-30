<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('authLogin');
    }

    function register(){
        return view("authRegister");
    }

    function AllUsers(){
        return User::all();
    }

    function loginPost(Request $request){
        $request-> validate([
            'email'=> 'required',
            'password'=>'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            
            return redirect()->intended(route('home'))->with('success',"Success login");
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

        $data=[
            'id'=> Str::uuid(),
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=> now(),
            'updated_at'=> now()
        ];
        $user = DB::table('users')->insert($data);
        if(!$user){
            return redirect(route('register'))->with('error','Registration failed, try again');
       }
       return redirect(route('login'))->with('success',"Registration success");
    }

    function deleteUser(string $id){
        if(auth()->user()->role == 'Admin'){

            $deletedUser = DB::table('users')-> where('id', $id)->delete();
            if ($deletedUser){
                return redirect()->back()->with('Success', 'User deleted successful');
            } else {
                return redirect()->back()->with('error','Failed to delete user');
            }
        }
        return redirect()->back()->with('error', 'Access denied. Admins only');
    }

    function updateUser(Request $request, $id){
        if(auth()->user()->role == 'Admin'){
            $request -> validate([
                'name'=>'required',
                'email'=>'required|email|unique:users, email'. $id,
                'password'=> 'nullable|min:6'
            ]);

            $data =[
                'name'=> $request->name,
                'email'=> $request->email
            ];
            if($request->password){
                $data['password']->bcrypt($request->password);
            }
            $updateUser = DB::table('users')->where('id', $id)->update($data);
            if($updateUser){
                return redirect()->back()->with('success', 'User updated successfuly');
            }
            return redirect()-> back()->with('error', "Failed to update user");
        }
        return redirect()->back()->with('error', 'Access denied. Admins only');
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
