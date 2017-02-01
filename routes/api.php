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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/search', function(Request $request) {
	return App\User::search($request->get('query'))->take(3)->get();
});


Route::group(['middleware' => 'auth:api'], function() {
    
	Route::group(['prefix' => 'friend'], function() {

		Route::get('/add/{id}', 'Friendshipscontroller@add_friend');

		Route::get('/accept/{id}', 'Friendshipscontroller@accept_friend');
		
		Route::get('/delete/{id}', 'Friendshipscontroller@delete_friend');

		Route::get('/check/{id}', 'Friendshipscontroller@check');

	});

	Route::get('get_unread', function() {
	    return Auth::user()->unreadNotifications;
	});

	Route::post('/like/{id}', 'LikesController@like');

	Route::post('/unlike/{id}', 'LikesController@unlike');
	
	Route::get('/feed', 'PostsController@feed');

	Route::post('post/create', 'PostsController@store');
	
});