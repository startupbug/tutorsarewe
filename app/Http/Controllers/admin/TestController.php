<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Grade;
use App\Subject;
use App\Test;
use App\Mcq;
use App\Mcq_answer;

class TestController extends Controller
{
    public function add_testindex(){
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        
        return view('admin.test.mcq-create')->with($data);
    }

    //Post test and mcq by admin
    public function admin_addtest(Request $request){
         //dd($request->input());
         /* Validation */
        
         //Check if this grade and subject test is already added. 
         $test_exist = Test::where('grade_id', $request->input('grade_id'))
         ->where('subj_id', $request->input('subj_id'))->exists();
         
         if($test_exist){
            $this->set_session('Test is already added for this Grade and Subject.', false);
            return redirect()->route('admin_addtest_index');            
         }

         try{
             //inserting new Test
                $test = new Test();
                $test->subj_id = $request->input('subj_id');
                $test->grade_id = $request->input('grade_id'); 
                $test->heading = $request->input('heading');
                $test->description = $request->input('description'); 
                
                if($test->save()){
                    $test_id =  $test->id;

                    //Inserting multiple Mcqs                    
                    for($i=1; $i<=$request->input('ques_count'); $i++){
                        $mcq = new Mcq();
                        $mcq->test_id = $test_id;
                        $mcq->question = $request->input('q'.$i)[0];                      

                        if($mcq->save()){
                            $mcq_id = $mcq->id;

                            //Inserting Answers of this MCQ                        
                            foreach(array_slice($request->input('q'.$i),1) as $key => $answer) {
                                $mcq_answer = new Mcq_answer();
                                $mcq_answer->mcq_id = $mcq_id;
                                $mcq_answer->mcq_option = $answer;
            
                                //Seeing if it is the correct
                                if( $request->input('q'.$key.'_check') == $key){
                                    $mcq_answer->correct = 1;
                                }

                                $mcq_answer->save();
                                
                            }                              
                        }
                    }

                    $this->set_session('Test mcqs successully Added.', true);
                }else{
                    $this->set_session('Test mcqs couldnot Added.', false);
                }

	    	    return redirect()->route('admin_addtest_index');

	       }catch(\Exception $e){
	            $this->set_session('Test mcqs couldnot Added.'.$e->getMessage(), false);
	            return redirect()->route('admin_addtest_index');
	      }        
    }

    //get grade subjects
    public function get_grade_subjects(Request $request){

        $subjects = Subject::where('grade_id',  $request->input('id'))->get();
        
        $subj_html = '';
        foreach($subjects as $subject){
            $subj_html .= "<option value='".$subject->id."'>$subject->subject</option>";
        }

        return \Response::json(array('status' => 200, 'html' => $subj_html));
    }


}
