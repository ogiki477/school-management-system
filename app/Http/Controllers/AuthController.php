<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request){
        // $pass = '1234';
        // $hashedpass = Hash::make($pass);
        // dd($hashedpass);
        //dd("Yoo");
        if(!empty(Auth::check())){
            if(Auth::user()->is_role == 1){

                return redirect('admin/dashboard');

            }else if(Auth::user()->is_role == 2){
                return redirect('teacher/dashboard');
            } else if(Auth::user()->is_role == 3){
                return redirect('student/dashboard');
            }else if(Auth::user()->is_role == 4){
                return redirect('parent/dashboard');
            }
        }
        $data['meta_title'] = 'login';
        return view('auth.login',$data);
    }


    public function register(Request $request){
        $data['meta_title'] = 'register';
        return view('auth.register',$data);
    }

    public function forgot(Request $request){
        $data['meta_title'] = 'forgot';
        return view('auth.forgot',$data);
    }

    public function forgot_post(Request $request){
       //dd("yooo");

       $data = User::getEmailSingle($request->email);
       //dd($getEmail);
       if(!empty($data)){
    

        $data->remember_token = Str::random(30);
        $data->save();
        Mail::to($data->email)->send( new ForgotPasswordMail($data));

        return redirect()->back()->with('success','Check Your Email To Reset Your Password');

       }else{
        return redirect()->back()->with('error','Email Not Found');
       }
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

            if(Auth::user()->is_role == 1){

                return redirect('admin/dashboard');

            }else if(Auth::user()->is_role == 2){
                return redirect('teacher/dashboard');
            } else if(Auth::user()->is_role == 3){
                return redirect('student/dashboard');
            }else if(Auth::user()->is_role == 4){
                return redirect('parent/dashboard');
            }
        } else {
         
            return redirect('')->with('error','Wrong Credentials');
        }

    }

    public function reset_password($remember_token){
       // dd($token);

       $data = User::getTokenSingle($remember_token);

       if(!empty($data)){
        $data['data'] = $data;
        $data['meta_title'] = 'reset_password';
        return view('auth.reset',$data);
       }else{
        abort(404);
       }


    }

    public function post_reset_password($remember_token ,Request $request){
        if($request->password == $request->cpassword){

            $data = User::getTokenSingle($remember_token);
            $data->password = Hash::make($request->password);
            $data->remember_token = Str::random(30);
            $data->save();

            return redirect('')->with('success','Password Successfully Reset');

            

        }else {

            return redirect()->back()->with('error','Password And Confirm Password Does not Match!!'); 


        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
