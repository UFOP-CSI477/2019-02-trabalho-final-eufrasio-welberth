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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	// Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	route::get('/server_users/game','ServerUserController@game')->name('server_users.game');
	route::post('/server_users/server','ServerUserController@server')->name('server_users.server');
});
	Route::resource('games','GameController');
	Route::resource('servers','ServerController');
	Route::resource('users', 'UserController');
	Route::resource('server_users','ServerUserController');
	Route::post('/games/search','GameController@search')->name('games.search');


