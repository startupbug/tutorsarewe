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

    //Search tutor page
    public function search_tutor(){
    	return view('home.search');
    }

    //How it works page
    public function how_it_works(){
    	return view('home.howitworks');
    }

    //Tutor find jobs page
    public function find_tutor(Request $request){

        $data['countries'] = Country::all();


        $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
            ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
            ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
            ->select(
                'job_boards.*',
                'subjects.subject as sub_name',
                'subjects.subject_code',
                'lesson_types.type',
                'users.first_name'
            );

        $data['all_jobs'] = $data['all_jobs']->paginate(5);

        $data['request'] = $request;
        
        return view('home.findtutoringjob')->with($data);

    }

    public function filter_jobs(Request $request){
        dd($request->input());

        if ($request->conutry_id) {
            // dd($request->conutry_id);
            //Get cities of that Country
            $data['cities'] = State::join('countries','countries.id','=','states.country_id')
            ->leftjoin('cities','states.id','=','cities.state_id')
            ->select('states.*','countries.name as country_name','cities.name as city_name','cities.id as city_id')
            ->where('states.country_id',$request->conutry_id)->take(5)->get();
            
            //Filter data on basis of that country
            $data['all_jobs'] =  Job_board::leftjoin('users','users.id','=','job_boards.student_id')
                ->leftjoin('lesson_types','job_boards.lesson_type','=','lesson_types.id')
                ->leftjoin('subjects','job_boards.subject_id','=','subjects.id')
                ->select(
                    'job_boards.*',
                    'subjects.subject as sub_name',
                    'subjects.subject_code',
                    'lesson_types.type',
                    'users.first_name'
                )->where('');

            $data['all_jobs'] = $data['all_jobs']->paginate(5);


            dd($data['cities']);
        
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
