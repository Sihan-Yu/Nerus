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
 * Language routes
 */

Route::get('/language/{language}', ['as' => 'language', 'uses' => 'LanguageController@setLanguage']);

/**
 * Admin routes
 */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // User routes
    Route::group(['prefix' => 'user'], function () {

        Route::get('list', ['as' => 'user.index', 'uses' => 'UserController@index']);
        Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);
        Route::post('create', ['as' => 'user.store', 'uses' => 'UserController@store']);

    });
    //Roles
    Route::group(['prefix' => 'roles'], function () {

        Route::get('list', ['as' => 'role.index', 'uses' => 'RoleController@index']);
        Route::get('create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
        Route::post('create', ['as' => 'role.store', 'uses' => 'RoleController@store']);

    });

    //Permissions

});

//Home page routes
Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);


Route::get('/user/{id}', ['as' => 'user.view', 'uses' => 'UserController@showProfile']);


//Customer Group Routes
Route::group(['prefix' => 'customer'], function () {
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('all', ['as' => 'customer.contacts.index', 'uses' => 'CustomerContactController@index']);
        Route::get('create', ['as' => 'customer.contact.create', 'uses' => 'CustomerContactController@create']);
        Route::post('create', ['as' => 'customer.contact.store', 'uses' => 'CustomerContactController@store']);
        Route::get('{id}', ['as' => 'customer.contact.view', 'uses' => 'CustomerContactController@show']);
    });
    Route::get('all', ['as'=> 'customer.index', 'uses' => 'CustomerController@index']);
    Route::get('create', ['as' => 'customer.create', 'uses' => 'CustomerController@create']);
    Route::post('create', ['as' => 'customer.store', 'uses' => 'CustomerController@store']);
    Route::get('{id}', ['as' => 'customer.view', 'uses' => 'CustomerController@show']);
});

