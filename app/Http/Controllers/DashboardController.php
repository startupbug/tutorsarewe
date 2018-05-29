<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;
use Hash;
use DB;
use App\Tutor_subject;
class DashboardController extends Controller
{

   	public function __construct()
    {
    	
    }

    public function index(){
    	$data['user'] = User::join('profiles', 'profiles.user_id', '=', 'users.id')->where('users.id', Auth::user()->id)->first();
    	return view('dashboard.index')->with($data);
    }


    //Change existing password view
    public function edit_pass_view($id){
        $user_id = $id;
      return view('dashboard.settings.editpassword',['user_id' => $id]);
    }

    //Change existing password post
    public function edit_pass_post(Request $request){
      dd($request->input());
    }


    public function change_newpassword(Request $request, $id)
    {
       //    dd($request->input());
       // /* Validation */
      

         try{

        if (Hash::check($request->input('current_password'), Auth::user()->password)) {
           // The passwords match...

               $this->validate($request, [
                   'password' => 'required|confirmed|min:6|max:18',
               ]);

        //Updating Password
        $newpassword1 = bcrypt($request->input('password'));
        
        $user = User::find(Auth::user()->id);
        // dd($user);
        $user->password = $newpassword1;
        $password_updated = $user->save();

        
        if($password_updated){
                  $this->set_session('Password Updated', true);
        }else{
                  $this->set_session('Password couldnot be Updated. Please try again.', false); 
        }

        }else{
        //old password doesn't match
               $this->set_session('Please enter Correct Previous Password to change your Password.', false);    
        }

           return redirect()->route('dashboard_index');

         }catch(\Exception $e){
                   $this->set_session('Password couldnot be Updated. '.$e->getMessage(), false);
                   return redirect()->route('dashboard_index');                
             }

    }

    public function subjects()
    {
        $subjects_name = DB::table('subjects')->get();
        $all_subjects = Tutor_subject::join('subjects','subjects.id','=','tutor_subjects.subject_id')->select('subjects.*','tutor_subjects.id as tutor_subject_id')->where('tutor_id', Auth::user()->id)->get();
        // dd($subjects_name);
        return view('dashboard.subjects',['subjects' => $subjects_name, 'all_subjects'=>$all_subjects]);
    }

    public function tutor_subject(Request $request)
    {
        // dd($request->input());
        try{ 
            $subjects_name = DB::table('subjects')->get();
            $insert_subject = new Tutor_subject();
            $insert_subject->subject_id = $request->input('subject_name');
            $insert_subject->tutor_id = Auth::user()->id ;
            $insert_subject->save();
            if($insert_subject->save())
            {
               
                    $all_subjects = Tutor_subject::join('subjects','subjects.id','=','tutor_subjects.subject_id')->select('subjects.*','tutor_subjects.id as tutor_subject_id')->where('tutor_id',$insert_subject->tutor_id)->orderby('tutor_subjects.id','asc')->get();
                // dd($all_subjects);
                return view('dashboard.subjects',['all_subjects' => $all_subjects, 'user_id'=>$request->input('user_id'),'subjects' => $subjects_name]);    
            
                
            }

        }catch(\Exception $e){
           $this->set_session($e->getCode(), false);
           if($e->getCode()==23000){
                //subject already exists
                $this->set_session('You have already added this subject', false);
           }
           //die();
           return redirect()->route('subjects');   
        }

    }

}

