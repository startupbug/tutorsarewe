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

}
