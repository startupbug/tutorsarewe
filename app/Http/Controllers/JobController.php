<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Job_board;
use Auth;
use App\Events\Job_request;

class JobController extends Controller
{
	protected $subjects;
	protected $lessons;

    public function __construct(){
        $this->subjects = Subject::all();
    }

    /** Student Job Methods **/

    public function student_postJob(){
    	$data['subjects'] = $this->subjects;

    	return view('dashboard.job.post-job')->with($data);
    }

    public function student_postJob_req(Request $request){

    	/* Validation */

    	try{

	    	$job_board = new Job_board();
	    	$job_board->student_id = Auth::user()->id;
	        
	        foreach($request->input() as $key => $value) {

	            if($key != '_token' && $key != 'student_id'){
	                $job_board->$key = $value;
	            }
	        }

	        if($job_board->save()){
	        	$data['request'] = $request->input();
	        	event(new Job_request( $data ));

            	$this->set_session('Job Successfully Posted.', true);
	        }else{
            	$this->set_session('Job Couldnot Posted.', false);
	        }

	        return redirect()->route('postjob_view');

        }catch(\Exception $e){
            $this->set_session('Job Couldnot Posted.'.$e->getMessage(), false);
            return redirect()->route('postjob_view');                
        }
    }

    /** Tutor Job Methods **/

    public function get_student_jobs(){
      
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
