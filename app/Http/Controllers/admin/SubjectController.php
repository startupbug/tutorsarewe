<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;

class SubjectController extends Controller
{
	//Subject index Page
    public function index(){
    	$data['subjects'] = Subject::orderBy('id', 'desc')->get();
    	return view('admin.subject.index')->with($data);
    }

    //edit-subject-viewdata 
    public function edit_subj_data(Request $request){
    	return Subject::find($request->input('subjId'));
    }

    //Add-edit subject
    public function subject_submit(Request $request){
    	
    	try{
			if(is_null($request->input('edit_subj_id')) ) {
				//add subject
				$subject = new Subject();
			}else{
				//edit subject
				$subject = Subject::find($request->input('edit_subj_id'));
			}

			$subject->subject = $request->input('subject');
			$subject->subject_code = $request->input('subject_code');				

			if($subject->save()){
				return \Response::json(array('success' => true, 'msg' => 'Success. Operation Completed')); 
			}else{
				return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'));  
			}

      	}catch(\Exception $e){
				return \Response::json(array('success' => false, 'msg' => 'Error. Operation failed'.$e->getMessage()));  
        }
    }

    //Delete subject
    public function delete_subject($id){

    	//simple subject delete
    	try{
	    	$subject = Subject::find($id);
	    	$subject = $subject->delete();

	    	if($subject){
	           $this->set_session('Subject Successfully Deleted.', true);

	    	}else{
	           $this->set_session('Subject couldnot be deleted', false);                     		
	    	}

	        return redirect()->route('subject_admin');

	   	}catch(\Exception $e){
	   		$this->set_session('Subject couldnot be deleted', false);   
			return redirect()->route('subject_admin');
	    }        
    }
}
