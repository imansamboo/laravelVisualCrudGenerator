<?php
Route::get('/', function () { return redirect('/admin/home'); });
Route::get('/cruds/create', 'CrudsController@create');
Route::get('/cruds/createModel/{crudId}', 'CrudsController@createModel');
Route::get('/cruds/createView/{crudId}', 'CrudsController@createView');
Route::post('/cruds/store', 'CrudsController@store')->name('cruds.store');
Route::post('/cruds/storeMigration', 'CrudsController@storeMigration')->name('cruds.storeMigration');
Route::post('/cruds/storeModel', 'CrudsController@storeModel')->name('cruds.storeModel');
Route::post('/cruds/storeView', 'CrudsController@storeView')->name('cruds.storeٰView');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

});

Route::get('/foo', function () {
    /*unlink('/var/www/html/laravel/Ipcc/app/' . 'Adsds.php');
    $exitCode = Artisan::call('make:model', [
        'name' => 'Adsds'
    ]);*/
    //php artisan crud:migration posts --schema='title#string;body#enum#options={"technology": "Technology", "tips": "Tips"};'
    /*Artisan::call('crud:generate',[
        'name' => 'cats',
        '--fields' => 'title#string; content#text;
        category#select#options={"technology": "Technology", "tips":
        "Tips", "health": "Health"}',
        '--form-helper' => 'html'
    ]);*/
    Artisan::call('crud:migration',[
        'name' => 'fas',
        '--schema' => 'title#string;body#enum#options={"technology": "Technology", "tips": "Tips"};'
    ]);
    Artisan::call('migrate');

    //
});

Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('/samples', 'SamplesController');
Route::resource('/admins', 'AdminsController');

/*
 crud:generate photos --fields='title#string; content#text;
category#select#options={"technology": "Technology", "tips":
 "Tips", "health": "Health"}'   --form-helper=html

 */
Route::resource('cats', 'catsController');
Route::resource('admin/form-field-types', 'Admin\\FormFieldTypesController');
Route::resource('admin/migration-field-types', 'Admin\\MigrationFieldTypesController');
Route::resource('admin/view-options', 'Admin\\ViewOptionsController');
Route::resource('admin/crud-options', 'Admin\\CrudOptionsController');
Route::resource('admin/model-options', 'Admin\\ModelOptionsController');
Route::resource('admin/fishes', 'Admin\\FishesController');

Route::resource('mersads', 'MersadsController');