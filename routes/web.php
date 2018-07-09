<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Home Controller Route */
Route::get('/', 'HomeController@index')->name('home');

/* Authentication Routes */
Route::group(['middleware' => 'guest'], function () {

	Route::get('/signin', 'AuthenticationController@login_index')->name('signin');

	Route::get('/signup', 'AuthenticationController@register_index')->name('signup');

	Route::post('/user_register/ajax',array('as'=>'user_register.ajax','uses'=>'AuthenticationController@stateForCountryAjax'));

	Route::get('/forget_password', 'HomeController@forget_password')->name('forget_password_form');

	Route::post('/send_forget_email', 'AuthenticationController@send_forget_email')->name('send_forget_email');

	Route::get('/set_new_password/{token}', 'AuthenticationController@set_new_password')->name('set_new_password');

	Route::post('/new_password/{email}', 'AuthenticationController@new_password')->name('new_password');

	Route::get('register/verify/{token}', 'AuthenticationController@verify')->name('verified_email');

	//Student and Teacher register
	Route::post('/register', 'AuthenticationController@register_post')->name('register_post');

	//Login Post
	Route::post('/login', 'AuthenticationController@login_post')->name('login_post');

	Route::get('full_time_tutor_form','HomeController@full_time_tutor')->name('full_time_tutor');

	Route::post('full_time_email','HomeController@full_time_email')->name('full_time_email');

	Route::get('faqs','HomeController@faqs')->name('faqs');

});

//Logout Route
Route::get('/logout',  'AuthenticationController@logout_user')->name('logout_user');

// email subscribe
Route::post('/subscribe','HomeController@subscribe')->name('subscribe');

//How it works
Route::get('/how-it-works', 'HomeController@how_it_works')->name('how_it_works');

// lessons_grade
//Route::get('/lessons_grade', 'HomeController@lessons_grade')->name('lessons_grade');

//Tutor find jobs
Route::get('/find-job', 'HomeController@find_tutor')->name('find_tutor');

Route::post('/filter_register/ajax',array('as'=>'filter_register.ajax','uses'=>'HomeController@filterForCountryAjax'));

//Tutor filter jobs
Route::get('/find-job-filter', 'HomeController@filter_jobs')->name('filter_jobs');

     //Tutor profile

Route::get('/profile/{id}', 'Tutor\TutorController@tutor_profile')->name('tutor_profile');

Route::get('/tutor_earnings_details/{id}','Tutor\TutorController@tutor_earnings_details')->name('tutor_earnings_details');
//Fulltime Tutor
Route::get('/fulltime-tutor', 'HomeController@fulltime_tutor')->name('fulltime_tutor');

//Publications
Route::get('/publications', 'HomeController@publications')->name('publications');

//aboutus
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/contactus', 'HomeController@contactus')->name('contactus');
Route::post('/contactus_post', 'HomeController@contactus_post')->name('contactus_post');
Route::get('/testimonials', 'HomeController@testimonials')->name('testimonials');
Route::get('/faq', 'HomeController@faq')->name('faq');

// Route::post('/home_tutor_filter','HomeController@home_tutor_filter')->name('home_tutor_filter');


/* Dashboard Controller Routes */
Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard_index');

	Route::group(['middleware' => 'isTutor'], function () {

		//Get tutor subjects
		Route::get('/subjects','DashboardController@subjects')->name('subjects');

		//insert tutor selected subject
		Route::post('/tutor_subject','DashboardController@tutor_subject')->name('tutor_subject');

		//Delete subject
		Route::get('/delete-subject/{id}','DashboardController@subjDel')->name('subjDel');

	});

	Route::get('/edit-profile', 'ProfileController@edit_dashboard')->name('edit_dashboard');

	Route::post('/profile_register/ajax',array('as'=>'profile_register.ajax','uses'=>'ProfileController@editcityForCountryAjax'));

	//Edit profile post
	Route::post('/edit_profile', 'ProfileController@edit_profile')->name('edit_profile');

	/* Change existing Password */

	//Change existing password view
	Route::get('/settings/change-password/{id}', 'DashboardController@edit_pass_view')->name('change_pass_index');

	// change_newpassword
	Route::post('/settings/change-password/{id}', 'DashboardController@change_newpassword')->name('change_newpassword');

	//Change existing password post
	Route::post('/settings/change-password', 'DashboardController@edit_pass_post')->name('change_pass_post');

	//Ajax profile upload
	Route::post('imageUpload',['as'=>'imageUpload','uses'=>'ProfileController@imageUpload']);

	/* Job Controllers Routes */

	//Post Job view page
	Route::get('/post-job', 'JobController@student_postJob')->name('postjob_view');
	Route::get('/post-job-list', 'JobController@student_postJob_list')->name('post-job-list');
	Route::get('/post-job-detail/{id}', 'JobController@student_postJob_detail')->name('post-job-detail');

	Route::get('/find-job-detail', 'JobController@find_tutor_detail')->name('find_tutor_detail');
	//Post Job request page
	Route::post('/request-job', 'JobController@request_job')->name('request_job');
	Route::post('/post_rating', 'JobController@post_rating')->name('post_rating');

	//Student Reply to tutor on Student Job
	Route::post('/request-reply_tutor', 'JobController@reply_tutor')->name('reply_tutor');

	Route::post('/post-job', 'JobController@student_postJob_req')->name('student_postJob_req');

	/* Job Booking Lesson Routes */
	Route::get('/book-lesson/{jobid}','BookingController@booking_view')->name('booking_index');

	//Student Book Lesson
	//Book Lesson By Student
	Route::post('/book-lesson', 'BookingController@student_booklesson')->name('student_booklesson');

	//Booked Lessons
	Route::get('/bookings', 'DashboardController@bookings_list')->name('bookings_list');

	//Cancel Booking
	Route::get('/booking-cancel/{id}', 'BookingController@booking_cancel')->name('booking_cancel');

	//Accept Booking - by Tutor
	Route::get('/booking-accept/{id}', 'BookingController@booking_status')->name('booking_accept');

	//Accept Booking - by Tutor
	Route::get('/booking-reject/{id}', 'BookingController@booking_status')->name('booking_reject');

	//Booking details
	Route::get('/booking_detail/{id}', 'BookingController@booking_detail')->name('booking_detail');

	//Tutor earnings
	Route::get('/tutor-earnings', 'Tutor\TutorController@tutor_earnings')->name('tutor_earnings');

	/* Pre test Routes */

	//Pre test payment route page for students
	Route::get('/pre-test-payment/{name?}', 'Student\StudentController@pre_test_payment_index')->name('pre_test_payment_index');

	Route::get('/pay-pretest-student', 'Paypal\StudentPayment@pay_pretest_student')->name('pay_pretest_student');

	// Route::get('getPretestDone', 'Paypal\StudentPayment@getPreTestDone');
	// Route::get('getPreTestCancel', 'Paypal\StudentPayment@getPreTestCancel');

	//Pre test routes
	Route::get('/pre-test', 'Test\TestController@student_pretest')->name('student_pretest');

});

Route::post('depositWallet', 'Paypal\StudentPayment@depositWallet')->name('depositWallet');
Route::get('getDone', 'Paypal\StudentPayment@getDone');
Route::get('getCancel', 'Paypal\StudentPayment@getCancel');
Route::get('my_transactions', 'ProfileController@my_transactions')->name('my_transactions');
Route::get('transaction_detail/{id}', 'ProfileController@transaction_detail')->name('transaction_detail');
Route::post('walletWithdraw', 'ProfileController@walletWithdraw')->name('walletWithdraw');
Route::get('my_wallet', 'ProfileController@my_balance')->name('my_balance');

//Accept withdraw by Admin
Route::get('accept-withdraw/{id}', 'Paypal\StudentPayment@accept_withdraw')->name('accept_withdraw');


/* Unauthorized Access Routes */
Route::get('/401', 'HomeController@unauthorized')->name('unauthorized');

/* Error Route */
Route::get('/error/{message}', 'HomeController@error')->name('error');

//Tutor Search
Route::get('/tutor-search/', 'Tutor\TutorController@index')->name('tutors_listing');
Route::get('/tutor-search-ajax/', 'Tutor\TutorController@tutor_search_ajax');
Route::Post('/contact_tutor_email/', 'Tutor\TutorController@contact_tutor_email')->name('contact_tutor_email');
Route::get('/review', 'extraController@review')->name('review');


Route::get('scheduling', function () {
    return view('dashboard.scheduling');
});

Route::get('chat_box', function () {
    return view('dashboard.chat_box');
});

Route::get('create_schedule','Tutor\SchedulingController@create_schedule')->name('create_schedule');
Route::post('post_scheduling','Tutor\SchedulingController@post_scheduling')->name('post_scheduling');

//Test conduct Routes
Route::get('/lessons_grade', 'Test\TestController@lessons_grade')->name('lessons_grade');

//Get Test MCQs
Route::get('/test/{gradeId}/{subjectId}', 'Test\TestController@test_mcq_index')->name('test_mcq_index');

//Check Mcq
Route::post('/check-answer', 'Test\TestController@check_answer')->name('check_answer');


Route::get('mcqs', function () {
    return view('admin..mcqs.create');
});