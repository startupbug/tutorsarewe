<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthenticationController extends Controller
{
    public function login_index(){
        return view('authentication.login');
    }

    public function login_post(Request $request){
               
    }

    //Logging out user
    public function logout_user(){
        Auth::logout();
        return redirect()->route('home');          
    }

    //Register and signup page view
    public function register_index(){
        return view('authentication.signup_faq');
    }    
}
