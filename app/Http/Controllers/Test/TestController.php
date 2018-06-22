<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Test;
use App\Grade;
use App\Mcq;
use App\Mcq_answer;

class TestController extends Controller
{
    protected $grades;
    protected $data;

    public function __construct(){
        //Eager Loading
        $this->data['grades'] = Grade::with('subjects')->get();
        $this->data['option_attr'] = array(
                                            '0' => 'A',
                                            '1' => 'B',
                                            '2' => 'C',
                                            '3' => 'D'
                                        );
    }

    public function lessons_grade(){
        //Random Test
        $this->data['test_mcq'] = Test::with('mcqs')->where(['grade_id' => 1, 'subj_id'=> 3])
        ->first();
        //dd(count($this->data['test_mcq']));
        return view('tests.lessons_grade')->with($this->data);
    }

    public function test_mcq_index($grade_id , $subject_id){

        $this->data['test_mcq'] = Test::with('mcqs')->where(['grade_id' => $grade_id, 'subj_id'=> $subject_id])
                                              ->first();
        //dd($this->data['test_mcqs']);
        return view('tests.lessons_grade')->with($this->data);        
    }

    //Check test mcq answer post request
    public function check_answer(Request $request){
        //return $request->input();
        try{
            $mcq_answer = Mcq_answer::where(['mcq_id' => $request->input('mcq_id'), 'mcq_option' => $request->input('choice')])
                        ->first();
            $correct_answer = $mcq_answer->correct;

            //getting wrong answer that user clicked
            $wrong_ans = $mcq_answer->mcq_option;

            if($correct_answer){
                return \Response()->json(['msg' => "Correct Answer", 'status' => 200, 
                'ans' => $correct_answer, 'ans_text'=> $mcq_answer->mcq_option, 'wr_text' => $wrong_ans]);

            }else{

                $right_answer = Mcq_answer::where(['mcq_id' => $request->input('mcq_id'), 'correct' => 1])
                ->first();

                //getting wrong answer that user clicked
                $wrong_ans = $mcq_answer->mcq_option;
                                            
                $right_answer = $right_answer->mcq_option;
                return \Response()->json(['msg' => "Correct Answer", 'status' => 200, 'ans' => $correct_answer, 
                'ans_text'=> $right_answer, 'wr_text' => $wrong_ans]);
            }
            //do something


        }catch(\Exception $e){
            return \Response()->json(['msg' => "Something went wrong", 'status' => 422]);
        }
    }
}
