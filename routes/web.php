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

Route::get('/', 'HomeController@index');

Auth::routes();


Route::group(['middleware' => 'auth'], function() {

	Route::get('/home', 'HomeController@home');

    Route::name('profile.edit')->get('/profile/edit', 'profileController@edit');

    Route::name('profile.update')->post('/profile/update', 'profileController@update');

	Route::get('/notifications', 'NotificationsController@notifications');

});

Route::get('/profile/{user}', 'profileController@index')
    ->name('profile');
