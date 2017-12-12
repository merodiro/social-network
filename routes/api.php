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
        Route::get('/add/{user}', 'Friendshipscontroller@addFriend');

        Route::get('/accept/{user}', 'Friendshipscontroller@acceptFriend');

        Route::get('/delete/{user}', 'Friendshipscontroller@deleteFriend');

        Route::get('/check/{user}', 'Friendshipscontroller@check');
    });

    Route::get('get_unread', 'NotificationsController@unread');

    Route::post('/like/{id}', 'LikesController@like');

    Route::post('/unlike/{id}', 'LikesController@unlike');

    Route::get('/feed', 'PostsController@feed');

    Route::post('post/create', 'PostsController@store');
});
