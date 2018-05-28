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

