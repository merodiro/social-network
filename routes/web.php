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

Route::get('/profile/{slug}', 'profileController@index')
    ->name('profile');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    

    Route::name('profile.edit')->get('/profile/edit', 'profileController@edit');

    Route::name('profile.update')->post('/profile/update', 'profileController@update');

	Route::name('check')->get('/check_relationship_status/{id}', 'Friendshipscontroller@check');

	Route::name('add_friend')->get('/add_friend/{id}', 'Friendshipscontroller@add_friend');

	Route::name('accept_friend')->get('/accept_friend/{id}', 'Friendshipscontroller@accept_friend');
	
	Route::name('delete_friend')->get('/delete_friend/{id}', 'Friendshipscontroller@delete_friend');

	Route::get('get_unread', function() {
	    return Auth::user()->unreadNotifications;
	});

	Route::get('/notifications', 'HomeController@notifications');


	Route::post('post/create', 'PostsController@store');

	Route::get('/feed', 'FeedsController@feed');

	Route::get('/get_auth_user_data', function() {
	    return Auth::user();
	});

	Route::post('/like/{id}', 'LikesController@like');

	Route::post('/unlike/{id}', 'LikesController@unlike');
});
