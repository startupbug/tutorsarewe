<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;

class DashboardController extends Controller
{


    public function index(){
    	$data['user'] = User::join('profiles', 'profiles.user_id', '=', 'users.id')->where('users.id', Auth::user()->id)->first();
    	//dd($user);
    	return view('dashboard.index')->with($data);
    }


    //Change existing password view
    public function edit_pass_view(){
      return view('dashboard.settings.editpassword');
    }

    //Change existing password post
    public function edit_pass_post(Request $request){
      dd($request->input());
    }
}
