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
Route::get('/signin', 'AuthenticationController@login_index')->name('signin');

Route::get('/signup', 'AuthenticationController@register_index')->name('signup');

Route::get('/forget_password', 'HomeController@forget_password')->name('forget_password_form');

Route::post('/send_forget_email', 'AuthenticationController@send_forget_email')->name('send_forget_email');

Route::get('/set_new_password/{token}', 'AuthenticationController@set_new_password')->name('set_new_password');

Route::post('/new_password/{email}', 'AuthenticationController@new_password')->name('new_password');

//Student and Teacher register
Route::post('/register', 'AuthenticationController@register_post')->name('register_post');

//Login Post
Route::post('/login', 'AuthenticationController@login_post')->name('login_post');

//Logout Route
Route::get('/logout',  'AuthenticationController@logout_user')->name('logout_user');

//Tutor Search
Route::get('/tutor-search', 'HomeController@search_tutor')->name('search_tutor');

//How it works
Route::get('/how-it-works', 'HomeController@how_it_works')->name('how_it_works');

//Tutor find jobs
Route::get('/find-tutor', 'HomeController@find_tutor')->name('find_tutor');

//Fulltime Tutor
Route::get('/fulltime-tutor', 'HomeController@fulltime_tutor')->name('fulltime_tutor');

//Publications
Route::get('/publications', 'HomeController@publications')->name('publications');

//aboutus
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');



/* Dashboard Controller Routes */

Route::get('/dashboard', 'DashboardController@index')->name('dashboard_index');



Route::get('/edit-profile', 'ProfileController@edit_dashboard')->name('edit_dashboard');

//Edit profile post
Route::post('/edit_profile', 'ProfileController@edit_profile')->name('edit_profile');

/* Change existing Password */

//Change existing password view
Route::get('/settings/change-password', 'DashboardController@edit_pass_view')->name('change_pass_index');

//Change existing password post
Route::post('/settings/change-password', 'DashboardController@edit_pass_post')->name('change_pass_post');

Route::post('imageUpload',['as'=>'imageUpload','uses'=>'ProfileController@imageUpload']);
