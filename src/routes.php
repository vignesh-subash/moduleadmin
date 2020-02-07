<?php

$as = "";
if(\Kipl\Moduleadmin\Helpers\CAHelper::laravel_ver() == 5.5) {
	$as = config('moduleadmin.adminRoute').'.';
}

Route::group([
    'namespace'  => 'Kipl\Moduleadmin\Controllers',
	'as' => $as,
    'middleware' => ['web', 'auth', 'permission:ADMIN_PANEL', 'role:SUPER_ADMIN']
], function () {

	/* ================== Modules ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/modules', 'ModuleController');
	Route::resource(config('moduleadmin.adminRoute') . '/module_fields', 'FieldController');
	Route::get(config('moduleadmin.adminRoute') . '/module_generate_crud/{model_id}', 'ModuleController@generate_crud');
	Route::get(config('moduleadmin.adminRoute') . '/module_generate_migr/{model_id}', 'ModuleController@generate_migr');
	Route::get(config('moduleadmin.adminRoute') . '/module_generate_update/{model_id}', 'ModuleController@generate_update');
	Route::get(config('moduleadmin.adminRoute') . '/module_generate_migr_crud/{model_id}', 'ModuleController@generate_migr_crud');
	Route::get(config('moduleadmin.adminRoute') . '/modules/{model_id}/set_view_col/{column_name}', 'ModuleController@set_view_col');
	Route::post(config('moduleadmin.adminRoute') . '/save_role_module_permissions/{id}', 'ModuleController@save_role_module_permissions');
	Route::get(config('moduleadmin.adminRoute') . '/save_module_field_sort/{model_id}', 'ModuleController@save_module_field_sort');
	Route::post(config('moduleadmin.adminRoute') . '/check_unique_val/{field_id}', 'FieldController@check_unique_val');
	Route::get(config('moduleadmin.adminRoute') . '/module_fields/{id}/delete', 'FieldController@destroy');
	Route::post(config('moduleadmin.adminRoute') . '/get_module_files/{module_id}', 'ModuleController@get_module_files');

	/* ================== Code Editor ================== */
	Route::get(config('moduleadmin.adminRoute') . '/lacodeeditor', function () {
		if(file_exists(resource_path("views/ca/editor/index.blade.php"))) {
			return redirect(config('moduleadmin.adminRoute') . '/laeditor');
		} else {
			// show install code editor page
			return View('ca.editor.install');
		}
	});

	/* ================== Menu Editor ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/ca_menus', 'MenuController');
	Route::post(config('moduleadmin.adminRoute') . '/ca_menus/update_hierarchy', 'MenuController@update_hierarchy');

	/* ================== Configuration ================== */
	Route::resource(config('moduleadmin.adminRoute') . '/ca_configs', '\App\Http\Controllers\CA\CAConfigController');

    Route::group([
        'middleware' => 'role'
    ], function () {
		/*
		Route::get(config('moduleadmin.adminRoute') . '/menu', [
            'as'   => 'menu',
            'uses' => 'LAController@index'
        ]);
		*/
    });
});
