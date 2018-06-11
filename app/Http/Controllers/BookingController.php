<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_board;
use App\Booking;
use Auth;
use App\Wallet;
use App\Tutor_earning;

class BookingController extends Controller
{
    public function booking_view($jobid){
    	$data['job_board'] = Job_board::where('id', $jobid)->first();
    	return view('dashboard.booking.index')->with($data);
    }

    public function student_booklesson(Request $request){

    	/* Validation */

    	try{
	    	$booking = new Booking();
	    	$booking->date = $request->input('date');
	    	$booking->location = $request->input('location'); 
	    	$booking->amount = $request->input('amount');
	    	$booking->job_id = $request->input('job_id'); 
	    	$booking->lesson_hours = $request->input('lesson_hours');
	    	
	    	//Pending
	    	$booking->status_id = 4;

	    	if($booking->save()){
	    		$this->set_session('Lesson Successfully Booked.', true);
	    	}else{
	    		$this->set_session('Lesson Couldnot be Booked.', false);
	    	}

	    	return redirect()->route('booking_index');

	    }catch(\Exception $e){
	            $this->set_session('Lesson Couldnot be Booked.'.$e->getMessage(), false);
	            return redirect()->route('booking_index');
	    }

    }

    //Cancel Booking
    public function booking_cancel($bookingid){

	    /* Validation */
	    try{	
	    	//Check if this Booking belongs to this User (for student)
	    	$booking = Booking::join('job_boards', 'job_boards.id', '=', 'bookings.job_id')
	    				->where('job_boards.student_id', Auth::user()->id)
	    				->exists();

	        if($booking){
	        	//This booking exist for this user
	        	$booking_cancel = Booking::where('id', $bookingid)->update(['status_id'=> 3]);
	        
		        if($booking_cancel){ 
		        	$this->set_session('Booking Successfully Cancelled.', true);
		        }else{
		        	$this->set_session('Booking couldnot be Cancelled.', false);
		        }
		       
	        }else{
	        	$this->set_session('You dont have access to this Booking.', false);

	        }

	        return redirect()->route('bookings_list');

	    }catch(\Exception $e){
            $this->set_session('Booking couldnot be Cancelled.'.$e->getMessage(), false);
            return redirect()->route('bookings_list');
	    }        
    }

    //Accept/Reject Booking

    public function booking_status($bookingid){

	    /* Validation */
	   
	    try{
	    	//Check if this Booking belongs to this User (for student)
	    	$booking = Booking::leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
                                      ->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
                                      ->where('job_requests.tutor_id', Auth::user()->id)
                                      ->first();
            //dd($booking->amount);
	        if(count($booking) > 0){
	        	//This booking exist for this user
	        	//Accept booking
	        	if(\Route::currentRouteName() == 'booking_accept'){	
	        		//Accept
	        		$status = 7;
	        		$msg = 'Accepted';

	        		//Transfer amount from Student wallet to Tutor	        		
	        		$amount_to_transfer = $booking->amount;
	        		$student_id = $booking->student_id;
	        		$tutor_id = $booking->tutor_id;

	        		//deducting Amount from student
	        		$student_deducted = Wallet::where('user_id', $student_id)->decrement('balance', $amount_to_transfer);
	        		$teacher_increment = Wallet::where('user_id', $tutor_id)->increment('balance', $amount_to_transfer);

	        		//Amount transferred

	        		//Record booking Transaction
	        		$tutor_earning = new Tutor_earning();
	        		$tutor_earning->booking_id = $booking->id;
	        		$tutor_earning->save();

	        		//Update jobboard with tutor_id
	        		$update_tutor_status = Job_board::where('id', $booking->job_id)->update(['tutor_id'=> $booking->tutor_id]);

	        	}else if(\Route::currentRouteName() == 'booking_reject'){
	        		//Reject
	        		$status = 8;
	        		$msg = 'Rejected';
	        	}

	        	$booking_cancel = Booking::where('id', $bookingid)->update(['status_id'=> $status]);
	        
		        if($booking_cancel){
		        	$this->set_session('Booking Successfully '.$msg, true);
		        }else{
		        	$this->set_session('Booking couldnot be '.$msg, false);
		        }
		       
	        }else{
	        	$this->set_session('You dont have access to this Booking.', false);

	        }

	        return redirect()->route('bookings_list');

	    }catch(\Exception $e){
            $this->set_session('Booking couldnot be '.$msg.' '.$e->getMessage(), false);
            return redirect()->route('bookings_list');
	    }
    }

    public function booking_detail($booking_id){
    	//dd($booking_id);
    	//Getting Booking details for this id.

    	//Check if this booking belongs to this suer
    	$data['booking_detail'] = Booking::join('job_boards', 'job_boards.id', '=', 'bookings.job_id')
	                                      ->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
	                                      ->join('statuses', 'statuses.id', '=', 'bookings.status_id')
	                                      ->join('subjects', 'subjects.id', '=', 'job_boards.subject_id')
	                                      ->join('users', 'users.id', '=', 'job_requests.tutor_id')
	                                      ->join('lesson_types', 'lesson_types.id', '=', 'job_boards.lesson_type')
	                                      ->where('bookings.id', $booking_id)
	                                      ->select('bookings.date', 'bookings.location', 'bookings.amount', 'bookings.lesson_hours', 'bookings.status_id', 'job_boards.*', 'subjects.subject', 'statuses.status', 
												'job_requests.tutor_id as tutor_id', 'users.first_name',
												 'users.email', 'lesson_types.type')
                                      	  ->first();
		//dd($data['booking_detail']);
		return view('dashboard.booking.booking-detail')->with($data);               	
    }

    // //Accept/Reject Booking
    // public function booking_reject($bookingid){

	   //  /* Validation */

	   //  try{
	   //  	//Check if this Booking belongs to this User (for student)
	   //  	$booking = Booking::leftjoin('job_boards', 'job_boards.id', '=', 'bookings.job_id')
    //                                   ->leftjoin('job_requests', 'job_requests.job_id', '=', 'job_boards.id')
    //                                   ->where('job_requests.tutor_id', Auth::user()->id)
    //                                   ->exists();

	   //      if($booking){
	   //      	//This booking exist for this user
	   //      	$booking_cancel = Booking::where('id', $bookingid)->update(['status_id'=> 8]);
	        
		  //       if($booking_cancel){ 
		  //       	$this->set_session('Booking Successfully Rejected.', true);
		  //       }else{
		  //       	$this->set_session('Booking couldnot be Rejected.', false);
		  //       }
		       
	   //      }else{
	   //      	$this->set_session('You dont have access to this Booking.', false);

	   //      }

	   //      return redirect()->route('bookings_list');

	   //  }catch(\Exception $e){
    //         $this->set_session('Booking couldnot be Rejected.'.$e->getMessage(), false);
    //         return redirect()->route('bookings_list');
	   //  }
    // }    
}
