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

	Route::get('/notifications', 'HomeController@notifications');

});
