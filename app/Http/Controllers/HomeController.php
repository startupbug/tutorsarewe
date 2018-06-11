<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_board;
use App\Lesson_type;
use App\Subject;
use App\Country;
use App\State;
use App\City;
use DB;
use App\Subscriber;
use Illuminate\Support\Facades\Input;
use Session;
class HomeController extends Controller
{
	/* Home Page */
    public function index(){      
        $data['countries'] = Country::all();
        $data['subjects'] = Subject::all();
        return view('home.index')->with($data);
    }

    //How it works page
    public function how_it_works(){
    	return view('home.howitworks');
    }

    //Tutor find jobs page

    public function find_tutor(Request $request){
    
       $data['countries'] = Country::all();

       $data['subjects'] = Subject::all();
       $data['lesson_types'] = Lesson_type::all();
       
       // / dd($request->input());

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
                   'profiles.country_id',
                   'job_requests.job_id',
                    'users.id as user_id',
                    'users.last_name', 'job_requests.request_status'                 
               );

         //If course is set
       if(!is_null($request->input('courseform') ) ){
           $data['all_jobs']->where('job_boards.subject_id','=',$request->input('courseform'));
       }

       if(!is_null($request->input('country')))
       {
           $data['all_jobs']->where('profiles.country_id','=',$request->input('country'));
       }

       if(!is_null($request->input('city')))
       {
           $data['all_jobs']->where('profiles.city_id','=',$request->input('city'));
                          
       }

       if(!is_null($request->input('typeform')))
       {
           $data['all_jobs']->where('job_boards.lesson_type','=',$request->input('typeform'));
                          
       }        
       
       $data['all_jobs'] = $data['all_jobs']->paginate(6);

         //If course is set
       if(!is_null($request->input('courseform') ) ){

           $data['all_jobs']->appends(['courseform' => $request->input('courseform') ]);
       }

       if(!is_null($request->input('country')))
       {

           $data['all_jobs']->appends(['country' => $request->input('country') ]);
       }

       if(!is_null($request->input('city')))
       {

           $data['all_jobs']->appends(['city' => $request->input('city') ]);
                          
       }

       if(!is_null($request->input('typeform')))
       {

           $data['all_jobs']->appends(['typeform' => $request->input('typeform') ]);
                          
       }      

       //$data['all_jobs']->appends(['courseform' => $request->input('country') ]);

       // if(empty($data['all_jobs'] ))
       // {
           //$this->set_session('no user with this filter exist', false);
       return view('home.findtutoringjob')->with($data);
       //}

    }
    
    public function filterForCountryAjax(Request $request)
    {
        $country_name = $request->input('countryID');
        $country_id = urldecode($country_name);
        //return $country_name;
        $cities = DB::table('countries')
            ->select('cities.id', 'cities.name')
            ->join('states', 'states.country_id', '=', 'countries.id')
            ->join('cities', 'cities.state_id', '=', 'states.id')
            ->where("countries.id", '=',$country_id)
            ->get();
        return $cities;
    }

    public function filter_jobs(Request $request)
    {
        $data['countries'] = Country::all();

        $data['subjects'] = Subject::all();
        $data['lesson_types'] = Lesson_type::all();
        
        // / dd($request->input());

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
                    'profiles.country_id',
                    'job_requests.job_id'
                );

          //If course is set
        if(!is_null($request->input('courseform') ) ){
            $data['all_jobs']->where('job_boards.subject_id','=',$request->input('courseform'));
        }

        if(!is_null($request->input('country')))
        {
            $data['all_jobs']->where('profiles.country_id','=',$request->input('country'));
        }

        if(!is_null($request->input('city')))
        {
            $data['all_jobs']->where('profiles.city_id','=',$request->input('city'));
                           
        }

        if(!is_null($request->input('typeform')))
        {
            $data['all_jobs']->where('job_boards.lesson_type','=',$request->input('typeform'));
                           
        }        
        
        $data['all_jobs'] = $data['all_jobs']->paginate(6);

          //If course is set
        if(!is_null($request->input('courseform') ) ){

            $data['all_jobs']->appends(['courseform' => $request->input('courseform') ]);
        }

        if(!is_null($request->input('country')))
        {

            $data['all_jobs']->appends(['country' => $request->input('country') ]);
        }

        if(!is_null($request->input('city')))
        {

            $data['all_jobs']->appends(['city' => $request->input('city') ]);
                           
        }

        if(!is_null($request->input('typeform')))
        {

            $data['all_jobs']->appends(['typeform' => $request->input('typeform') ]);
                           
        }      

        //$data['all_jobs']->appends(['courseform' => $request->input('country') ]);

        // if(empty($data['all_jobs'] ))
        // {
            //$this->set_session('no user with this filter exist', false);
        return view('home.findtutoringjob')->with($data);
        //}

        //return view('home.findtutoringjob')->with($data);
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


    public function home_tutor_filter(Request $request)
    {
        dd($request->input());
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

    public function subscribe(Request $request)
    {

        $this->validate($request,[
           'email' => 'required|string|unique:users',
        ]);
        // dd($request->input());
        $subscriber = new Subscriber;
        $subscriber->email = Input::get('email');
        $subscriber->save();
        $this->set_session('Email has been subscribed.', true);
        return redirect('/');
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
