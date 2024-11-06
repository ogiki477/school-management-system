<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        //dd("Yoo");
        return view('auth.login');
    }


    public function register(Request $request){
        return view('auth.register');
    }

    public function forgot(Request $request){
        return view('auth.forgot');
    }
}
