<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_request;
use Auth;

class JobController extends Controller
{
    public function student_postJob(){
    	return view('dashboard.job.post-job');
    }

    public function student_postJob_req(){

          /* Validation */

          try{
            if($key != '_token' && $key != 'student_id'){
                $job_board->$key = $value;
            }
  	        

  	        if($job_board->save()){
  	        	$data['request'] = $request->input();
  	        	//event(new Job_request( $data ));

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


    //Student posted jobs

    public function student_postJob_list(){
      
      $data['jobs'] = Job_board::leftjoin('subjects', 'job_boards.subject_id', '=', 'subjects.id')
      							->where('student_id', Auth::user()->id)
      							->select('subjects.subject','job_boards.*')
      							->get();

      return view('dashboard.job.post-job-list')->with($data);
    }

    public function student_postJob_detail($id){

      $data['single_job'] = Job_board::leftjoin('subjects', 'job_boards.subject_id', '=', 'subjects.id')
                              ->leftjoin('lesson_types', 'lesson_types.id', '=', 'job_boards.lesson_type')
                              ->where('job_boards.id', $id)
                              ->select('subjects.subject','job_boards.*', 'lesson_types.type')
                              ->first();

      return view('dashboard.job.post-job-detail')->with($data);
    }


    /** Tutor Job Methods **/

    public function get_student_jobs(){
      
    }

    //Request Job By Tutor
    public function request_job(Request $request){
        
        /* Validation */
        
        try{

            if(Auth::user()->role_id == 2){
                return \Response::json(array('success' => false, 'msg' => 'Students cannot send Job request')); 
            }

            $job_request = new Job_request();
            $job_request->job_id = $request->input('job_id');
            $job_request->description = $request->input('description'); 
            $job_request->tutor_id = Auth::user()->id;

            if($job_request->save()){
              return \Response::json(array('success' => true, 'msg' => 'Job Successfully Requested')); 
            }else{
              return \Response::json(array('success' => false, 'msg' => 'Error. Job Couldnot be requested'));  
            }

        }catch(\Exception $e){
            return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'.$e->getMessage()));  
        } 
    }

}
