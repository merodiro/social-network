<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', 'UsersController@auth');

Route::post('/search', 'UsersController@search');


Route::group(['middleware' => 'auth:api'], function() {
    
	Route::group(['prefix' => 'friend'], function() {

		Route::get('/add/{id}', 'Friendshipscontroller@add_friend');

		Route::get('/accept/{id}', 'Friendshipscontroller@accept_friend');
		
		Route::get('/delete/{id}', 'Friendshipscontroller@delete_friend');

		Route::get('/check/{id}', 'Friendshipscontroller@check');

	});

	Route::get('get_unread', 'HomeController@unread_notifications');

	Route::post('/like/{id}', 'LikesController@like');

	Route::post('/unlike/{id}', 'LikesController@unlike');
	
	Route::get('/feed', 'PostsController@feed');

	Route::post('post/create', 'PostsController@store');
	
});