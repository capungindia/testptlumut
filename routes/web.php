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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function(){
	Route::get('account', 'AccountController@index')->name('account.index');
	Route::get('account/data', 'AccountController@data')->name('account.data');	
	Route::get('account/create', 'AccountController@create')->name('account.create');
	Route::post('account/save', 'AccountController@save')->name('account.save');
	Route::get('account/change', 'AccountController@change')->name('account.change');
	Route::post('account/update', 'AccountController@update')->name('account.update');
	Route::get('account/delete', 'AccountController@delete')->name('account.delete');

	Route::get('post', 'PostController@index')->name('post.index');	
	Route::get('post/data', 'PostController@data')->name('post.data');	
	Route::get('post/create', 'PostController@create')->name('post.create');
	Route::post('post/save', 'PostController@save')->name('post.save');
	Route::get('post/change', 'PostController@change')->name('post.change');
	Route::post('post/update', 'PostController@update')->name('post.update');
	Route::get('post/delete', 'PostController@delete')->name('post.delete');
});