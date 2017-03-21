<?php


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

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'friend'], function () {
        Route::get('/add/{id}', 'Friendshipscontroller@addFriend');

        Route::get('/accept/{id}', 'Friendshipscontroller@acceptFriend');

        Route::get('/delete/{id}', 'Friendshipscontroller@deleteFriend');

        Route::get('/check/{id}', 'Friendshipscontroller@check');
    });

    Route::get('get_unread', 'NotificationsController@unread');

    Route::post('/like/{id}', 'LikesController@like');

    Route::post('/unlike/{id}', 'LikesController@unlike');

    Route::get('/feed', 'PostsController@feed');

    Route::post('post/create', 'PostsController@store');
});
