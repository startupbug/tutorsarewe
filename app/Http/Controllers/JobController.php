<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function student_postJob(){
    	return view('dashboard.job.post-job');
    }

    public function student_postJob_req(){
    }

    public function student_postJob_list(){
      return view('dashboard.job.post-job-list');
    }

    public function student_postJob_detail(){
      return view('dashboard.job.post-job-detail');
    }
}
