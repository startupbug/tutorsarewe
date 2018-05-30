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

Route::get('register/verify/{token}', 'AuthenticationController@verify')->name('verified_email');
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




Route::get('makePayment', 'Paypal\StudentPayment@DepositWallet');
Route::get('getDone', 'Paypal\StudentPayment@getDone');
Route::get('getCancel', 'Paypal\StudentPayment@getCancel');

/* Admin Panel Routes */
Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {

	//User Home page.
	Route::get('/', 'Admin\AdminController@index')->name('admin-index');

	//User management Route.
	Route::get('/user-management', 'Admin\AdminController@usermanagement_index')->name('user-management');

	//User Resource Controller
	Route::resource('users', 'Admin\UserController');

	//Role Resource Controller
	Route::resource('roles', 'Admin\RoleController');

	//Permission Resource Controller
	Route::post('/assign-permission', 'Admin\PermissionController@assign_permission_post')->name('assign-permission-post');

	Route::post('/assign-permission-del', 'Admin\PermissionController@assign_permission_del')->name('assign-permission-del');

	Route::resource('permissions', 'Admin\PermissionController');

	/* Activity Log Routes */

	Route::get('/activity-log', 'admin\AdminController@activitylog_index')->name('activitylog_index');

	/* Todo List Routes */
	//Todo custom update
	Route::post('/todos_update', 'admin\TodoController@todos_update')->name('todos_update');

	//Todo custom delete
	Route::post('/todos_delete', 'admin\TodoController@todos_delete')->name('todos_delete');

	//Task done undone, change status
	Route::post('/task_status', 'admin\TodoController@task_status')->name('task_status');

	//Task sorting
	Route::post('/task_sort', 'admin\TodoController@task_sort')->name('task_sort');

	/*Todo Resource*/
	Route::resource('todos', 'admin\TodoController');

	/* Pages resource */
	Route::resource('pages', 'Admin\PageController');

	Route::get('analytics', 'Admin\AnalyticsController@analytics')->name('analytics');

});

	//Admin Login Authentication
	Route::get('/admin-login', 'Admin\AuthController@login_index')->name('adminlogin_index');
	Route::post('/admin-login', 'Admin\AuthController@login_post')->name('admin_login_post');

	//Logout
	Route::get('/admin-logout', 'Admin\AuthController@logout')->name('logout');

/* Unauthorized Access Routes */
Route::get('/401', 'HomeController@unauthorized')->name('unauthorized');

/* Error Route */
Route::get('/error/{message}', 'HomeController@error')->name('error');

Route::get('/my_transactions', 'ProfileController@my_transactions')->name('my_transactions');
Route::get('/my_transaction_detail', 'ProfileController@my_transaction_detail')->name('my_transaction_detail');

Route::get('/my_balance', 'ProfileController@my_balance')->name('my_balance');
