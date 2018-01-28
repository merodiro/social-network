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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@home')
        ->name('home');

    Route::get('/profile/edit', 'profileController@edit')
        ->name('profile.edit');

    Route::post('/profile/update', 'profileController@update')
        ->name('profile.update');

    Route::get('/notifications', 'NotificationsController@notifications');
});

Route::get('/profile/{user}', 'profileController@index')
    ->name('profile');

Route::get('/admin', function () {
    Settings::set('name', 'Social network');
    // Settings::flush();
    // return view('welcome');
    return Settings::all();
})->middleware('admin');
