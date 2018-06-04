<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Role;
use App\Password_reset;
use DB;
use App\Events\RegisterEvent;
use Session;
use Mail;
use Carbon;
use App\Mail\ForgetPasswordMail;
use App\Mail\EmailVerification;
use Validator;
use App\Events\UserRegistration;
use App\Wallet;

class AuthenticationController extends Controller
{
    public function login_index(){
        return view('authentication.login');
    }

    public function login_post(Request $request){
     
          $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required',
        ]); 
          try{

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {
               $this->logActivity(Auth::user()->first_name.'Logged in on Tutor');
               DB::table('profiles')
                    ->where('user_id', Auth::user()->id)
                    ->update(['online_status' => 1]);
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
        DB::table('profiles')
            ->where('user_id', Auth::user()->id)
            ->update(['online_status' => 0]);
        Auth::logout();
        return redirect()->route('home');          
    }

    //Register and signup page view
    public function register_index(){
        return view('authentication.signup_faq');
    }

    public function register_post(Request $request){
         // dd($request->input());
         /* Validation */


         $this->validate($request, [
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users',
            'username'=>'required|string|max:15|unique:profiles',
            'password' => 'required|string|min:6|confirmed',
            'phonenum1' => 'required|numeric',
        ]); 


        //Inserting user
        // $validator = Validator::make(
        //     ['name' => 'required|string|max:255'],
        //     ['email' => 'required|string|email|max:255|unique:users'],
        //     ['username'=>'required|string|without_spaces|max:255|unique:users|regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
        //     ['password' => 'required|string|min:6|confirmed'],
        //     ['phone_no' => 'required|regex:/(01)[0-9]{9}/']
        // );
        
      //  dd($validator);

        //if(isset(123))
      //  {
           try{
            $user = new User();

            //Saving users data on user table
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = bcrypt( $request->input('password') );


            $user->role_id = $request->input('role_id');
            $user->email_token = str_random(10);
            $user->verified = 0; 

            $user->phone_no = $request->input('countryCode').$request->input('phonenum1');

            $user->status_id = 1; 



            if($user->save()){
                
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name, 'email'=> $user->email]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', 'We have sent you a verification email!');

                // Saving Profle info of user.
                $data['user'] = $user;
                $data['request'] = $request->all();
                //event(new UserRegistration($data));
                //dd($data);
                $profile = new Profile();
                $profile->username = $request->input('username');
                $profile->address = $request->input('address');
                $profile->zipcode = $request->input('zipcode');                        
                $profile->state = $request->input('state');
                $profile->country = $request->input('country');
                $profile->user_id = $user->id;

                if($request->input('role_id') == 3){
                    //He is a Teacher
                    $this->logActivity('New Teacher '.$request->input('first_name').' Signedup on Tutorareus');

                    $profile->hv_teac = $request->input('hv_teac');
                    $profile->teac_exp = $request->input('teac_exp');

                }else{
                    $this->logActivity('New Student '.$request->input('first_name').' Signedup on Tutorareus');
                }

                $profile->save();

                $w = new Wallet();

                $w->user_id = $user->id;

                $w->save();

                /*Calling Register user Event */
                // event(new RegisterEvent());

                /*Attaching User Role to the New User */ 
                $user_role = Role::find($request->input('role_id'));
                $user->attachRole($user_role);

                $this->set_session('Verify your account by clickng on link.', true);

            }else{
                 $this->set_session('User Couldnot be Registered.', false);
            }
            
               return redirect()->route('signup');

       }
            catch(\Exception $e){
                $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
                return redirect()->route('signup');                
            }
        }

        

 

    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        //dd($token)
        $user = User::where('email_token',$token)->first();
         // dd($user);

        if(isset($user)){
            $result = User::where('email_token',$token)->update(['verified'=> 1, 'email_token'=> null]);
            auth()->login($user);
            //$this->suspend = 0;
            //$this->email_token = null;
            //return $this->save();

            //$verify = User::where('email_token',$token)->verified();
            //Redirect Login with Message

        }else{
            //Redirect kisi aur apge with Message\

        }

        //dd($result);
        $this->set_session('you just verified your email', true);
        return redirect()->route('home');
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
            $this->set_session('your request has been emailed', true);
            return redirect()->back();   
        }
        else{
                $this->set_session('this email does not exist', false);
                return redirect()->back();
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
     $this->validate($request, [
            'password' => 'required|string|min:6|confirmed'
        ]); 
   
      
           
            $new_pass = bcrypt($request->input('password'));
            $update_pass =  DB::table('users')
                ->where('email', $email)
                ->update(['password' => $new_pass]);
                if($update_pass)
                {
                    //deleting token row
                    $del_token = DB::table('password_resets')
                ->where('email', $email)
                ->delete();

                    $this->set_session('Your password is updated', true);
                }
                else{
                    $this->set_session('Your password is not updated', false);   
                }

                return redirect()->route('signin');

    }
}
