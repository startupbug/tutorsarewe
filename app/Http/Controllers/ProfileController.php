<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;


class ProfileController extends Controller
{
    public function edit_dashboard(){
    	$data['user'] = User::join('profiles', 'profiles.user_id', '=', 'users.id')->where('users.id', Auth::user()->id)->first();

    	return view('dashboard.editprofile')->with($data);
    }

    public function edit_profile(Request $request){
    	//dd($request->input());

    	try{
    	//Update User
    	$user_id = $request->input('user_id');
    	$user = User::find($user_id);
    	$user->first_name = $request->input('first_name');
    	$user->last_name = $request->input('last_name');

    	//Update Profile
    		Profile::where('user_id', $user_id)->update([
    			'tution_per_hour' => $request->input('tution_per_hour'),

    		]);

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
            return redirect()->route('signup');
        }

    	//$user->first_name = $request->input('first_name');

    }


    public function ImageUpload(Request $request){
        $img_name = '';
        if(Input::file('profile_pic')){
        $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));

        Profile::where('user_id' ,'=', $request->user_id)->update([
        'profile_pic' => $img_name
        ]);
        $path = asset('public/storage/profile-pictures/').'/'.$img_name;
        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]);
        $this->set_session('Image Uploaded successfully', true);
        }else{
            $this->set_session('Image is Not Uploaded. Please Try Again', false);
        return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
     }

     public function UploadImage($type, $file){
        if( $type == 'profile_pic'){
        $path = 'public/storage/profile-pictures/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
}
