<?php

use Kipl\Moduleadmin\Helpers\CAHelper;

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'CA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(CAHelper::laravel_ver() == 5.5 || CAHelper::laravel_ver() == 5.6) {
	$as = config('moduleadmin.adminRoute').'.';

	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {

	/* ================== Dashboard ================== */

	Route::get(config('moduleadmin.adminRoute'), 'CA\DashboardController@index');
	Route::get(config('moduleadmin.adminRoute'). '/dashboard', 'CA\DashboardController@index');

	/* ================== Users ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/users', 'CA\UsersController');
	Route::get(config('moduleadmin.adminRoute') . '/user_dt_ajax', 'CA\UsersController@dtajax');

	/* ================== Uploads ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/uploads', 'CA\UploadsController');
	Route::post(config('moduleadmin.adminRoute') . '/upload_files', 'CA\UploadsController@upload_files');
	Route::get(config('moduleadmin.adminRoute') . '/uploaded_files', 'CA\UploadsController@uploaded_files');
	Route::post(config('moduleadmin.adminRoute') . '/uploads_update_caption', 'CA\UploadsController@update_caption');
	Route::post(config('moduleadmin.adminRoute') . '/uploads_update_filename', 'CA\UploadsController@update_filename');
	Route::post(config('moduleadmin.adminRoute') . '/uploads_update_public', 'CA\UploadsController@update_public');
	Route::post(config('moduleadmin.adminRoute') . '/uploads_delete_file', 'CA\UploadsController@delete_file');

	/* ================== Roles ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/roles', 'CA\RolesController');
	Route::get(config('moduleadmin.adminRoute') . '/role_dt_ajax', 'CA\RolesController@dtajax');
	Route::post(config('moduleadmin.adminRoute') . '/save_module_role_permissions/{id}', 'CA\RolesController@save_module_role_permissions');

	/* ================== Permissions ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/permissions', 'CA\PermissionsController');
	Route::get(config('moduleadmin.adminRoute') . '/permission_dt_ajax', 'CA\PermissionsController@dtajax');
	Route::post(config('moduleadmin.adminRoute') . '/save_permissions/{id}', 'CA\PermissionsController@save_permissions');

	/* ================== Departments ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/departments', 'CA\DepartmentsController');
	Route::get(config('moduleadmin.adminRoute') . '/department_dt_ajax', 'CA\DepartmentsController@dtajax');

	/* ================== Employees ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/employees', 'CA\EmployeesController');
	Route::get(config('moduleadmin.adminRoute') . '/employee_dt_ajax', 'CA\EmployeesController@dtajax');
	Route::post(config('moduleadmin.adminRoute') . '/change_password/{id}', 'CA\EmployeesController@change_password');

	/* ================== Organizations ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/organizations', 'CA\OrganizationsController');
	Route::get(config('moduleadmin.adminRoute') . '/organization_dt_ajax', 'CA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/backups', 'CA\BackupsController');
	Route::get(config('moduleadmin.adminRoute') . '/backup_dt_ajax', 'CA\BackupsController@dtajax');
	Route::post(config('moduleadmin.adminRoute') . '/create_backup_ajax', 'CA\BackupsController@create_backup_ajax');
	Route::get(config('moduleadmin.adminRoute') . '/downloadBackup/{id}', 'CA\BackupsController@downloadBackup');
});
