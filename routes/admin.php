<?php 

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

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

	/* Analytics Route */
	Route::get('analytics', 'Admin\AnalyticsController@analytics')->name('analytics');

	//Load Admin Subject page
	Route::get('/subjects', 'Admin\SubjectController@index')->name('subject_admin');	

	//Edit subject-data 
	Route::post('/edit-subj-data', 'Admin\SubjectController@edit_subj_data')->name('edit_subj_data');

	//Edit-add data admin subject
	Route::post('/add-edit-subjectdata', 'Admin\SubjectController@subject_submit')->name('subject_submit');

	//Subject delete
	Route::get('/subject-delete/{id}', 'Admin\SubjectController@delete_subject')->name('delete_subject');

	//Listing Of Job Requests
	Route::get('/job-requests', 'Admin\JobController@index')->name('job_requests');
	Route::get('/manage-reviews', 'Admin\AdminController@profile_reviews')->name('profile_reviews');
	Route::get('/review-delete/{id}', 'Admin\AdminController@review_delete')->name('review_delete');

	Route::get('/accept_review/{id}/', ["as" => "accept-review","uses" => "Admin\AdminController@accept_review"]);
	Route::get('/reject_review/{id}/', ["as" => "reject-review", "uses" => "Admin\JobController@reject_review"]);	


	Route::get('/job_boards', 'Admin\JobController@job_boards')->name('job_boards');
	Route::get('/job-requests-delete/{id}', 'Admin\JobController@delete_job_request')->name('delete_job_request');
	Route::get('/job-boards-delete/{id}', 'Admin\JobController@delete_job_board')->name('delete_job_board');
	Route::post('/edit-job-request-data', 'Admin\JobController@edit_job_request')->name('edit_job_request');
	Route::get('/accept_job_request/{id}/', ["as" => "accept-job-request","uses" => "Admin\JobController@accept_job_request"]);
	
	Route::get('/accept_job_board/{id}/', ["as" => "accept_job_board","uses" => "Admin\JobController@accept_job_board"]);
	Route::get('/reject_job_request/{id}/', ["as" => "reject-job-request", "uses" => "Admin\JobController@reject_job_request"]);	
	Route::get('/reject_job_board/{id}/', ["as" => "reject_job_board", "uses" => "Admin\JobController@reject_job_board"]);
	// transactions
	Route::get('transactions', 'Admin\AdminController@transactions')->name('admin_transactions');
	Route::get('withdraws', 'Admin\AdminController@withdraws')->name('admin_withdraws');
	Route::get('transaction_details/{id}', 'Admin\AdminController@transaction_detail')->name('admin_transaction_detail');	

	
});

	//Admin Login Authentication
	Route::get('/admin-login', 'Admin\AuthController@login_index')->name('adminlogin_index');
	Route::post('/admin-login', 'Admin\AuthController@login_post')->name('admin_login_post');

	//Logout
	Route::get('/admin-logout', 'Admin\AuthController@logout')->name('logout');