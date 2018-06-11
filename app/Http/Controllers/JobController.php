<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_request;
use Auth;
use App\Job_board;
use App\Chat;
use App\Chat_message;
use App\Subject;

class JobController extends Controller
{
    public function student_postJob(){
      $data['subjects'] = Subject::all();
    	return view('dashboard.job.post-job')->with($data);
    }

    public function student_postJob_req(Request $request){

          /* Validation */

          try{

	    	$job_board = new Job_board();
	    	$job_board->student_id = Auth::user()->id;



             $job_board->request_status = 0;

             foreach($request->input() as $key => $value){
               if($key != '_token' && $key != 'student_id' && $key != 'request_status'){
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

      //Getting Tutors responses on this Job
      $data['tutor_responses'] = Job_request::select('job_boards.id as jobboard_id', 'users.first_name' , 'profiles.bio', 'profiles.tution_per_hour', 'job_requests.tutor_id', 'job_requests.description', 'profiles.profile_pic', 'bookings.id as booking_id')
                                        ->leftjoin('job_boards', 'job_boards.id', '=', 'job_requests.job_id')
                                        ->leftjoin('users', 'users.id', '=', 'job_requests.tutor_id')
                                        ->leftjoin('profiles', 'profiles.user_id', '=', 'users.id')
                                        ->leftjoin('bookings', 'bookings.job_id', '=', 'job_boards.id')
                                        ->where('job_requests.job_id', $id)
                                        ->get();

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

            //Check if Tutor has completed required info for Requesting Job ||
            if( is_null(Auth::user()->profile->bio) || is_null(Auth::user()->profile->tution_per_hour) ){
                $text = 'You need to Fill in your BIO and Rates/hour to Send request to Job.';
                return \Response::json(array('success' => false, 'msg' => $text));
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

    //Student reply to tutor on job response
    public function reply_tutor(Request $request){
        //return $request->input();

        //Creating new Chat for this Job Message
        $chat = new Chat();
        $chat->job_id = $request->input('job_id');

        if($chat->save()){
          // new chat creted for this tutor and student

          //Inserting the message into this chat
          $chat_message = new Chat_message();
          $chat_message->from_id = Auth::user()->id;
          $chat_message->chat_id = $chat->id;

          //Get tutor id
          //$job_board = Job_board::where('id', $request->input('job_id'))->first();
          $tutor_id = $request->input('tutor_id');

          $chat_message->to_id = $tutor_id;

          $chat_message->chat_message = $request->input('chat_message');

          if( $chat_message->save() ){
              return \Response::json(array('success' => true, 'msg' => 'Responded to Tutor Successfully'));
          }else{
              return \Response::json(array('success' => false, 'msg' => 'Couldnot respond to this Tutor'));
          }

        }else{
             return \Response::json(array('success' => false, 'msg' => 'Couldnot respond to this Tutor'));
        }

    }

    //Tutor find jobs page
    public function find_tutor_detail(){
    	return view('dashboard.job.findtutoringjob_detail');
    }
}
