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

Route::post('/search', 'UsersController@search');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', 'UsersController@auth');

    Route::group(['prefix' => 'friend'], function () {
        Route::get('/add/{user}', 'FriendshipsController@addFriend');

        Route::get('/accept/{user}', 'FriendshipsController@acceptFriend');

        Route::get('/delete/{user}', 'FriendshipsController@deleteFriend');

        Route::get('/check/{user}', 'FriendshipsController@check');
    });

    Route::get('get_unread', 'NotificationsController@unread');

    Route::post('/like/{id}', 'LikesController@like');

    Route::post('/unlike/{id}', 'LikesController@unlike');

    Route::get('/feed', 'PostsController@feed');

    Route::post('post/create', 'PostsController@store');
});
