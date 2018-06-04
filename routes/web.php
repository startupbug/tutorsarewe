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

	Route::get('/forget_password', 'HomeController@forget_password')->name('forget_password_form');

	Route::post('/send_forget_email', 'AuthenticationController@send_forget_email')->name('send_forget_email');

	Route::get('/set_new_password/{token}', 'AuthenticationController@set_new_password')->name('set_new_password');

	Route::post('/new_password/{email}', 'AuthenticationController@new_password')->name('new_password');

	Route::get('register/verify/{token}', 'AuthenticationController@verify')->name('verified_email');
	//Student and Teacher register
	Route::post('/register', 'AuthenticationController@register_post')->name('register_post');

	//Login Post
	Route::post('/login', 'AuthenticationController@login_post')->name('login_post');

});

//Logout Route
Route::get('/logout',  'AuthenticationController@logout_user')->name('logout_user');


//How it works
Route::get('/how-it-works', 'HomeController@how_it_works')->name('how_it_works');

//Tutor find jobs
Route::get('/find-job', 'HomeController@find_tutor')->name('find_tutor');

     //Tutor profile
Route::get('/tutor_profile/{id}', 'Tutor\TutorController@tutor_profile')->name('tutor_profile');

//Fulltime Tutor
Route::get('/fulltime-tutor', 'HomeController@fulltime_tutor')->name('fulltime_tutor');

//Publications
Route::get('/publications', 'HomeController@publications')->name('publications');

//aboutus
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');



/* Dashboard Controller Routes */
Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard_index');

	Route::get('/subjects','DashboardController@subjects')->name('subjects');
	Route::post('/tutor_subject','DashboardController@tutor_subject')->name('tutor_subject');

	//Delete subject
	Route::get('/delete-subject/{id}','DashboardController@subjDel')->name('subjDel');

	Route::get('/edit-profile', 'ProfileController@edit_dashboard')->name('edit_dashboard');

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
	Route::get('/post-job-detail', 'JobController@student_postJob_detail')->name('post-job-detail');

	//Post Job request page
	
	Route::post('/post-job', 'JobController@student_postJob_req')->name('student_postJob_req');
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