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
        // dd($request->input());
    	/* Validation */
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'bio'=> 'required|string|max:255',
            'address'=> 'required|string|max:255',
            'zipcode'=> 'required|numeric',
            'state'=> 'required|string|max:255',
            'country'=> 'required|string|max:255',
            'countryCode'=> 'required|numeric|max:255',
            'phonenum1'=> 'required|numeric',
            'tution_per_hour' => 'required|numeric|max:255',
        ]); 

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


    public function ImageUpload(Request $request){
        $img_name = '';
        if(Input::file('profile_pic')){
          $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));
          Profile::where('user_id' ,'=', $request->user_id)->update([
          'profile_pic' => $img_name
          ]);
          $path = asset('public/dashboard/assets/images/profile/').'/'.$img_name;
          return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]);
          $this->set_session('Image Uploaded successfully', true);
        }else{
            $this->set_session('Image is Not Uploaded. Please Try Again', false);
        return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
     }

     public function UploadImage($type, $file){
        if( $type == 'profile_pic'){
        $path = 'public/dashboard/assets/images/profile/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    public function my_transactions()
    {
      return view('dashboard.transaction');
    }
    public function my_transaction_detail()
    {
      return view('dashboard.transaction_detail');
    }
    public function my_balance()
    {
      return view('dashboard.balance');
    }
}
