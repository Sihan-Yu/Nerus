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


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

