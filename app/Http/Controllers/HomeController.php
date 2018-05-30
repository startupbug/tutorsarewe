<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	/* Home Page */
    public function index(){
      return view('home.index');
    }

    //Search tutor page
    public function search_tutor(){
    	return view('home.search');
    }

    //How it works page
    public function how_it_works(){
    	return view('home.howitworks');
    }

    //Tutor find jobs page
    public function find_tutor(){
    	return view('home.findtutoringjob');
    }

    //Fulltime Tutor page
    public function fulltime_tutor(){
    	return view('home.fulltimetutor');
    }

    //Publications page
    public function publications(){
    	return view('home.publication');
    }

    public function forget_password()
    {   
        return view('authentication.forget_password');
    }

    //aboutus page
    public function aboutus(){
    	return view('home.aboutus');
    }

    //401
    public function unauthorized(){
        return view('401');
    }                    
}
