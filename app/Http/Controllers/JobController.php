<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function student_postJob(){
    	return view('dashboard.job.post-job');
    }



    public function student_postJob_req(){
	            if($key != '_token' && $key != 'student_id'){
	                $job_board->$key = $value;
	            }
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

}
