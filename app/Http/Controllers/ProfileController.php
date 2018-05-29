<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
	//view profile on dashboard
    public function edit_dashboard(){
    	$data['user'] = User::join('profiles', 'profiles.user_id', '=', 'users.id')->where('users.id', Auth::user()->id)->first();

    	return view('dashboard.editprofile')->with($data);
    }

    // edit profile post
    public function edit_profile(Request $request){
    	
    	/* Validation */
    	
    	try{
	    	//Update User
	    	$user_id = $request->input('user_id');
	    	$user = User::find($user_id);
	    	$user->first_name = $request->input('first_name');
	    	$user->last_name = $request->input('last_name');
	    	$user->phone_no = $request->input('countryCode').$request->input('phonenum1');
	    	//Update Profile
	    	$profile_array = [ 'tution_per_hour' => $request->input('tution_per_hour'),
	    		'bio' => $request->input('bio'),
	    		'address' => $request->input('address'),
	    		'zipcode' => $request->input('zipcode'),
	    		'state' => $request->input('state'),
	    	];

           if(Input::hasFile('profile_pic')){
                $file = Input::file('profile_pic');
                $tmpFilePath = '/dashboard/assets/images/profile';
                $tmpFileName = time() . '-' . $file->getClientOriginalName();
                $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
                $path = $tmpFileName;

                $profile_array['profile_pic'] = $path;
            }

    		$profile = Profile::where('user_id', $user_id)->update($profile_array);

    		if($user->save() && $profile){
	            $this->set_session('Profile Successfully Edited.', true);
	           
    		}else{
	            $this->set_session('Profile couldnot be Edited.', false); 
    		}

    		 return redirect()->route('edit_dashboard'); 

        }catch(\Exception $e){
            $this->set_session('Profile couldnot be Edited.'.$e->getMessage(), false);
            return redirect()->route('edit_dashboard');                
        }

    	//$user->first_name = $request->input('first_name');

    }
}
