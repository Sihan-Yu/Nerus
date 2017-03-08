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
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Language routes
 */

Route::get('/language/{language}', ['as' => 'language', 'uses' => 'LanguageController@setLanguage']);

/**
 * Admin routes
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Users', 'middleware' => 'auth'], function () {

    // User routes
    Route::group(['prefix' => 'user'], function () {

        Route::get('list', ['as' => 'user.index', 'uses' => 'UserController@index']);
        Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);
        Route::post('create', ['as' => 'user.store', 'uses' => 'UserController@store']);

    });

});

// User profile route
Route::get('/profile/{id}', ['as' => 'user.view', 'uses' => 'Users\UserController@show', 'middleware' => 'auth']);
Route::get('/audit', ['as' => 'audit.trail', 'uses' => 'Users\AuditTrailController@index', 'middleware' => 'auth']);