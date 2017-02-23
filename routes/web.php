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
 * User routes
 */

Route::get('/users', ['as' => 'user.index', 'uses' => 'UserController@getList']);
Route::get('/user/create', ['as' => 'user.create', 'uses' => 'UserController@createUser']);
Route::get('/user/{id}', ['as' => 'user.view', 'uses' => 'UserController@showProfile']);
Route::post('/user/create', ['as' => 'user.store', 'uses' => 'UserController@storeUser']);

Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);