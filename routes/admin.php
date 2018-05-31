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

});

	//Admin Login Authentication
	Route::get('/admin-login', 'Admin\AuthController@login_index')->name('adminlogin_index');
	Route::post('/admin-login', 'Admin\AuthController@login_post')->name('admin_login_post');

	//Logout
	Route::get('/admin-logout', 'Admin\AuthController@logout')->name('logout');