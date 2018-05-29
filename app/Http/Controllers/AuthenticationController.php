<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Role;
use App\Password_reset;
use DB;
use Session;
use Mail;
use Carbon;
use App\Mail\ForgetPasswordMail;
class AuthenticationController extends Controller
{
    public function login_index(){
        return view('authentication.login');
    }

    public function login_post(Request $request){

          try{

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {
               
               return redirect()->route('home');

            }else{
               $this->set_session('invalid username or password', false);
               return redirect()->route('signin');
            }

          }catch(\Exception $e){

               $this->set_session('Something went wrong. Please Try again', false);
               return redirect()->route('signin');
          }   
    }

    //Logging out user
    public function logout_user(){
        Auth::logout();
        return redirect()->route('home');          
    }

    //Register and signup page view
    public function register_index(){
        return view('authentication.signup_faq');
    }

    public function register_post(Request $request){
         
         /* Validation */

        /* $this->validate($request, [
            'name' => 'required|alpha|max:15|min:5',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required',
            'password' => 'required|confirmed|min:6|max:18', 
        ]); */

        //Inserting user
        try{
            $user = new User();

            //Saving users data on user table
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = bcrypt( $request->input('password') );
            $user->phone_no = $request->input('phone_no'); 
            $user->role_id = $request->input('role_id'); 

            if($user->save()){

                //Saving Profle info of user.
                $profile = new Profile();
                $profile->address = $request->input('address');
                $profile->zipcode = $request->input('zipcode');                        
                $profile->state = $request->input('state');
                $profile->country = $request->input('country');
                $profile->user_id = $user->id;

                if($request->input('role_id') == 3){
                    //He is a Teacher
                    $profile->hv_teac = $request->input('hv_teac');
                    $profile->teac_exp = $request->input('teac_exp');                
                }

                $profile->save();

                /*Attaching User Role to the New User */ 
                 $user_role = Role::find($request->input('role_id'));
                 $user->attachRole($user_role);

                 $this->set_session('User Successfully Registered.', true);

            }else{
                 $this->set_session('User Couldnot be Registered.', false);
            }
            
            return redirect()->route('signup');

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
            return redirect()->route('signup');                
        }

    }

    public function send_forget_email(Request $request){
        // dd($request->input());
        $insert = new Password_reset();
        $insert->email = $request->input('email');
        $insert->token = str_random(60);
        $mytime = Carbon\Carbon::now();
        // dd($mytime->toDateTimeString()); 
        $insert->created_at = $mytime->toDateTimeString();
        $insert->save();
        $user = DB::table('users')->where('email','=',$request->input('email'))->first();
        if(isset($user))
        {
            $email = new ForgetPasswordMail(new Password_reset([ 'email' => $insert->email, 'token'=> $insert->token]));
        
            Mail::to($user->email)->send($email);
            
            DB::commit();
            Session::flash('query','your query has been emailed');
            return redirect()->back();   
        }
        else{
                dd('error');
        }
         
    }

    public function set_new_password($token)
    {
        $user = DB::table('password_resets')->where('token','=',$token)->first();
        // dd($user->email);
        return view('authentication.new_password',['user' => $user]);
        // dd($token);
    }    

    
    public function new_password(Request $request, $email)
    {
        // dd($request->input('new_pass'));
                    // bcrypt($data['password'])
        $new_pass = bcrypt($request->input('new_pass'));
        DB::table('users')
            ->where('email', $email)
            ->update(['password' => $new_pass]);
            return redirect()->back();
    }

}
