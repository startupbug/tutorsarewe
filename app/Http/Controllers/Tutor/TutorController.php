<?php
namespace App\Http\Controllers\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Tutor_subject;
use App\Transaction;
use App\WithdrawWallet;
use App\Subject;
use App\Wallet;
use Auth;
use Mail;
use DB;
class TutorController extends Controller
{
	//Search tutor page & Tutor listing in Front Navbar Find A Tutor    
    public function index(Request $request){
        $take = 10;
        if ($request->name) {
            $words = explode(' ', $request->name);
            $first_name = $words[0];
            $last_name = end($words);
            
            $args['listing'] = User::where('role_id',3)
                                    ->where('verified',1)                                    
                                    ->where('first_name','LIKE','%'.$first_name.'%')
                                    ->orWhere('last_name','LIKE','%'.$last_name.'%')
                                    ->whereExists(function($query)
                            {
                                $query->select(DB::raw(1))
                                    ->from('tutor_subjects')
                                    ->whereRaw('tutor_subjects.tutor_id = users.id');
                            })
                            ->take($take)
                            ->get();
            
        }elseif (isset($request->online_status) || isset($request->location) || isset($request->rating) || isset($request->tution_per_hour) ){
            $myString = $request->tution_per_hour;
            $myArray = explode(',', $myString);

            $query = "SELECT * FROM `users` LEFT JOIN `profiles` ON `users`.`id` = `profiles`.`user_id` LEFT JOIN `tutor_subjects` ON `tutor_subjects`.`tutor_id` = `users`.`id` WHERE `users`.`role_id` = 3 AND `users`.`verified` = 1";
            $query = $request->online_status ? $query." AND `profiles`.`online_status` = {$request->online_status}" : $query;
            $query = $request->rating ? $query." AND `profiles`.`rating` >= {$request->rating}" : $query;
            $query = $request->location ? $query." AND `profiles`.`address` LIKE '%{$request->location}%'" : $query;
            $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` >=  {$myArray[0]}" : $query;
            $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` <=  {$myArray[1]}" : $query;
            $query .= " GROUP BY `users`.`id` LIMIT {$take}";

            $args['listing'] = DB::select( DB::raw($query) );
             
 
        }else{
            $args['listing'] = User::where('role_id',3)
                                ->where('verified',1)
                                ->whereExists(function($query)
                                {
            $query->select(DB::raw(1))
                                ->from('tutor_subjects')
                                ->whereRaw('tutor_subjects.tutor_id = users.id');
                                })
                                ->limit($take)
                                ->get();
        }
        foreach ($args['listing'] as $key => $tutor_subject) {
            $args['tutor_subjects'][$tutor_subject->id] = Tutor_subject::where('tutor_subjects.tutor_id',$tutor_subject->id)->get();
        }

        $args['count'] = count($args['listing']);
        $args['subjects'] = Subject::get();     

        return view('home.search')->with($args);
    }
    //Search tutor page & Tutor listing in Front Navbar Find A Tutor By Ajax
    public function tutor_search_ajax(Request $request){
        $take = 10;
        $limit = $request->limit ? $request->limit : 20;
        $skip = $limit - $take;
        if ($request->name) {
            $words = explode(' ', $request->name);
            $first_name = $words[0];
            $last_name = end($words);
            
            $args['listing'] = User::where('role_id',3)
                                    ->where('verified',1)                                    
                                    ->where('first_name','LIKE','%'.$first_name.'%')
                                    ->orWhere('last_name','LIKE','%'.$last_name.'%')
                                    ->whereExists(function($query)
                            {
                                $query->select(DB::raw(1))
                                    ->from('tutor_subjects')
                                    ->whereRaw('tutor_subjects.tutor_id = users.id');
                            })
                            ->skip($skip)
                            ->take($take)
                            ->get();
                            // dd($args['listing']);
            
        }elseif (isset($request->online_status) || isset($request->location) || isset($request->rating) || isset($request->tution_per_hour) ){
            $myString = $request->tution_per_hour;
            $myArray = explode(',', $myString);

            $query = "SELECT * FROM `users` LEFT JOIN `profiles` ON `users`.`id` = `profiles`.`user_id` LEFT JOIN `tutor_subjects` ON `tutor_subjects`.`tutor_id` = `users`.`id` WHERE `users`.`role_id` = 3 AND `users`.`verified` = 1";
            $query = $request->online_status ? $query." AND `profiles`.`online_status` = {$request->online_status}" : $query;
            $query = $request->rating ? $query." AND `profiles`.`rating` >= {$request->rating}" : $query;
            $query = $request->location ? $query." AND `profiles`.`address` LIKE '%{$request->location}%'" : $query;
            $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` >=  {$myArray[0]}" : $query;
            $query = $request->tution_per_hour ? $query." AND `profiles`.`tution_per_hour` <=  {$myArray[1]}" : $query;
            $query .= " GROUP BY `users`.`id` LIMIT {$take} OFFSET {$skip}";

            $args['listing'] = DB::select( DB::raw($query) );
             
 
        }else{
            $args['listing'] = User::where('role_id',3)
                                ->where('verified',1)
                                ->whereExists(function($query)
                                {
            $query->select(DB::raw(1))
                                ->from('tutor_subjects')
                                ->whereRaw('tutor_subjects.tutor_id = users.id');
                                })
                                ->skip($skip)
                                ->take($take)
                                ->get();
        }
        foreach ($args['listing'] as $key => $tutor_subject) {
            $args['tutor_subjects'][$tutor_subject->id] = Tutor_subject::where('tutor_subjects.tutor_id',$tutor_subject->id)->get();
        }

        $args['count'] = count($args['listing']);
        if($args['count']){
            foreach($args['listing'] as $key => $value){
                $html = '<div class="row f_mainborder">';
                $html .= '<div class="col-md-2">';
                      if(isset($value->profile->profile_pic))
                $html .= "<img src=". asset('public/dashboard/assets/images/profile/'.$value->profile->profile_pic).' class="img-responsive img_searchresp">';
                      else
                $html .= "<img src=". asset('public/dashboard/assets/images/profile/1527579609-1.PNG').' class="img-responsive img_searchresp">';
                $html .= '</div>';
                $html .= '<div class="col-md-7 border_search">';
                $html .= '<h3 class="search_name">'  .$value->first_name." ". $value->last_name.'</h3>';
                $html .= '<h3 class="f_course">';
                         foreach($args['tutor_subjects'][$value->id] as $subject){
                $html .= $subject->subject->subject.', '; 
                         }                  
                $html .= '</h3>';
                $html .= '<p class="f_findcontent"> ' ;
                      if(isset($value->profile->bio)){
                $html .= $value->profile->bio;
                        }
                $html .= '</p>';
                $html .= '<a href="#" class="f_detail">Read More</a>';
                $html .= '</div>';
                $html .= '<div class="col-md-3">';
                $html .= '<h3 class="search_name">' ;
                      if(isset($value->profile->tution_per_hour))
                $html .= '$'.$value->profile->tution_per_hour.'/hour' ;
                $html .= '</h3>';
                $html .= '<ul class="search_list">';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li><i class="fa fa-star f_star"></i></li>';
                $html .= '<li>';
                $html .= '<h3 class="search_name f_iphone">5.0(367)</h3>';
                $html .= '</li>';
                $html .= '</ul>';
                $html .= '<ul class="search_list">';
                $html .= '<li><i class="fa fa-clock-o f_clock"></i></li>';
                $html .= '<li>';
                $html .= '<h3 class="search_name ">1,722 <span>hours tutoring</span></h3>';
                $html .= '</li>';
                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';
                $status = 200;
            }                  
        }
        else{
            $html = "<h2>Sorry no more results available</h2>";
             $status = 201;
        }
        return \Response()->json(['status' => $status, 'data' => $html, 'msg' => 'check console']);
    }
    //Tutor profile
    public function tutor_profile($id){
        $args['tutor_info'] = User::find($id); 
        $args['tutor_subjects'] = Tutor_subject::where('tutor_id',$id)->get();
        foreach($args['tutor_subjects'] as $value){
            $subjects[] = $value->subject_id;
        }
        $args['recommended_users']  = User::leftJoin('tutor_subjects','tutor_subjects.tutor_id','=','users.id')->select('users.first_name','users.last_name')->whereIn('tutor_subjects.subject_id',$subjects)->where('users.id','!=',$id)->groupBy('users.id')->get();
        return view('home.tutor_profile')->with($args);
    }
    public function contact_tutor_email(Request $request){
        $email_data['name'] = $request->tutor_name;        
        $email_data['email'] = $request->tutor_email;
        $email_data['description'] = $request->description;
        if (isset($email_data)) {            
             Mail::send('emails.contact_tutor',['email_data'=>$email_data] , function ($message) use($email_data){
              $message->from($email_data['email'], 'Contact Email - TutorAreUs');
              $message->to(env('MAIL_USERNAME'))->subject('TutorAreUs - Contact Email');
            });
        }
        $this->set_session('You Have Successfully Send An Email', true);
        return redirect()->back();
    }
}