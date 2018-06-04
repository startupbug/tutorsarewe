<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_board;
use App\Lesson_type;
use App\Subject;
use App\Country;
use App\State;
use App\City;
class HomeController extends Controller
{
	/* Home Page */
    public function index(){
      return view('home.index');
    }

    //How it works page
    public function how_it_works(){
    	return view('home.howitworks');
    }

    //Tutor find jobs page

    public function find_tutor(Request $request){

        // dd($request->input());      
        $data['countries'] = Country::all();

        $data['subjects'] = Subject::all();

        $data['lesson_types'] = Lesson_type::all();
        // dd($data['subjects']);
        $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
            ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
            ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
            ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
            ->select(
                'job_boards.*',
                'subjects.subject as sub_name',
                'subjects.subject_code',
                'lesson_types.type',
                'users.first_name',
                'job_requests.job_id'
            );
        $data['all_jobs'] = $data['all_jobs']->paginate(5);
        // dd($data['all_jobs']);
        $data['request'] = $request;
        
        return view('home.findtutoringjob')->with($data);

    }

    public function filter_jobs(Request $request)
    {
        //dd($request->input());
        $data['subjects'] = Subject::all();
        $data['lesson_types'] = Lesson_type::all();

        if ($request->conutry_id)
        {
             
           
            $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
                ->leftjoin('profiles','users.id','=','profiles.user_id')
                ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
                ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
                ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
                ->select(
                    'job_boards.*',
                    'subjects.subject as sub_name',
                    'subjects.subject_code',
                    'lesson_types.type',
                    'users.first_name',
                    'profiles.country',
                    'job_requests.job_id'
                )->where('profiles.country','=',$request->input('conutry_id'));

            $data['all_jobs'] = $data['all_jobs']->paginate(6);
            
            $data['all_jobs']->appends(['courseform' => $request->input('conutry_id') ]);
            if(empty($data['all_jobs'] ))
            {
                $this->set_session('no user with this country exist', false);
                return view('home.findtutoringjob')->with($data);
            }
            return view('home.findtutoringjob')->with($data);
        }

        if($request->input('courseform'))
        {   
            
            //dd($request->input('courseform'));
            $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
            ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
            ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
            ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
            ->select(
                'job_boards.*',
                'subjects.subject as sub_name',
                'subjects.subject_code',
                'lesson_types.type',
                'users.first_name',
                'job_requests.job_id'
            )->where('job_boards.subject_id','=',$request->input('courseform'))->paginate(6);
           // dd($data['all_jobs']);
            $data['all_jobs']->appends(['courseform' => $request->input('courseform') ]);

            return view('home.findtutoringjob')->with($data);
        }

        if ($request->input('state'))
        {

            $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
                ->leftjoin('profiles','users.id','=','profiles.user_id')
                ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
                ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
                ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
                ->select(
                    'job_boards.*',
                    'subjects.subject as sub_name',
                    'subjects.subject_code',
                    'lesson_types.type',
                    'users.first_name',
                    'profiles.country',
                    'profiles.state',
                    'job_requests.job_id'
                )->where('profiles.state','=',$request->input('state'));

            $data['all_jobs'] = $data['all_jobs']->paginate(6);
             $data['all_jobs']->appends(['courseform' => $request->input('state') ]);
            // dd($data['all_jobs']);
            if(empty($data['all_jobs']))
            {
                $this->set_session('no user with this country exist', false);
                return view('home.findtutoringjob')->with($data);
            }
            return view('home.findtutoringjob')->with($data);
        }
    

        if ($request->input('typeform'))
        {
            // dd(888);
            $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
                ->leftjoin('profiles','users.id','=','profiles.user_id')
                ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
                ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
                ->leftjoin('job_requests','job_boards.id','=','job_requests.job_id')
                ->select(
                    'job_boards.*',
                    'subjects.subject as sub_name',
                    'subjects.subject_code',
                    'lesson_types.type',
                    'users.first_name',
                    'profiles.country',
                    'profiles.state',
                    'job_requests.job_id'
                )->where('job_boards.lesson_type','=',$request->input('typeform'));

            $data['all_jobs'] = $data['all_jobs']->paginate(6);
            $data['all_jobs']->appends(['courseform' => $request->input('typeform') ]);
            // dd($data['all_jobs']);
            if(empty($data['all_jobs']))
            {
                $this->set_session('no user with this country exist', false);
                return view('home.findtutoringjob')->with($data);
            }
            return view('home.findtutoringjob')->with($data);
        }
        //         if ($request->country_id) {
        //     $states = $states->where('country_id', $request->country_id);
        // }


        // if ($request->state_id) {
        //     $cities = $cities->where('country_id', $request->state_id);
        // }

        //  if ($request->type) {
        //      $args['all_jobs'] = $args['all_jobs']->where('job_boards.lesson_type' , $request->type);
        //  }
         
        //  if ($request->course) {
        //      $args['all_jobs'] = $args['all_jobs']->where('job_boards.subject_id' , $request->type);
        //  }

        //  if ($request->course) {
        //      $args['all_jobs'] = $args['all_jobs']->where('job_boards.subject_id' , $request->type);
        //  }

    }
     //Tutor profile
    public function tutor_profile(){
    	return view('home.tutor_profile');
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

    //error page
    public function error($message){
        return view('error')->with('message', $message);
    }    
}
