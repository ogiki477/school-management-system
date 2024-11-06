<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //dd("Yoo");
        if(!empty(Auth::check())){
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }


    public function register(Request $request){
        return view('auth.register');
    }

    public function forgot(Request $request){
        return view('auth.forgot');
    }

    public function register_insert(Request $request){
       dd($request->all());

    }


    public function login_insert(Request $request){

        //dd("Yooo");
        //creating a hashed password
        // $pass = '1234';
        // $hashedpass = Hash::make($pass);
        // dd($hashedpass);
        // die();

        //dd($request->all());
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$remember)){

            return redirect('admin/dashboard');

        } else {
         
            return redirect('')->with('error','Wrong Credentials');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
