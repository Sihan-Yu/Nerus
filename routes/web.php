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

/**
 * Auth routes
 */

Auth::routes();

/**
 * Home routes
 */

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Language routes
 */

Route::get('/language/{language}', ['as' => 'language', 'uses' => 'LanguageController@setLanguage']);

/**
 * Admin routes
 */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // User routes
    Route::group(['prefix' => 'user', 'namespace' => 'Users'], function () {

        Route::get('list', ['as' => 'user.index', 'uses' => 'UserController@index']);
        Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);
        Route::post('create', ['as' => 'user.store', 'uses' => 'UserController@store']);

    });

    // Permissions
    Route::group(['prefix' => 'permissions', 'namespace' => 'Permissions'], function () {

        Route::get('list', ['as' => 'permissions.index', 'uses' => 'PermissionsController@index']);
        Route::get('create', ['as' => 'permissions.create', 'uses' => 'PermissionsController@create']);
        Route::post('create', ['as' => 'permissions.store', 'uses' => 'PermissionsController@store']);

        Route::post('attach', ['as' => 'permissions.attach', 'uses' => 'PermissionsController@attach']);
        Route::post('detach', ['as' => 'permissions.detach', 'uses' => 'PermissionsController@detach']);

    });

    // Role
    Route::group(['prefix' => 'role', 'namespace' => 'Permissions'], function () {

        Route::get('{id}', ['as' => 'role.index', 'uses' => 'RoleController@index']);
        Route::post('create', ['as' => 'role.store', 'uses' => 'RoleController@store']);

        Route::post('attach', ['as' => 'role.attach', 'uses' => 'RoleController@attach']);
        Route::post('detach', ['as' => 'role.detach', 'uses' => 'RoleController@detach']);

    });

});

// User profile route
Route::get('/profile/{id}', ['as' => 'user.view', 'uses' => 'Users\UserController@show', 'middleware' => 'auth']);
Route::get('/audit', ['as' => 'audit.trail', 'uses' => 'Users\AuditTrailController@index', 'middleware' => 'auth']);