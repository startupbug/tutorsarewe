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
use DB;
class TutorController extends Controller
{
	//Search tutor page & Tutor listing in Front Navbar Find A Tutor    
    public function index(Request $request){
        $limit = $request->limit ? $request->limit : 10;
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
                            ->limit($limit)
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
            $query .= " GROUP BY `users`.`id` LIMIT {$limit}";

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
                                ->limit($limit)
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
        $limit = $request->limit ? $request->limit : 10;
        $skip = $limit - 10;
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
                            ->take($limit)
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
            $query .= " GROUP BY `users`.`id` LIMIT {$limit} OFFSET {$skip}";

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
                                ->limit($limit)
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
}