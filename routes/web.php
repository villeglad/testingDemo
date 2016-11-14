<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@index')->name('loginForm');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@register');

Route::get('/admin', function () {
    return 'Logged in';
})->middleware('auth')->name('admin');

Route::get('show_flash', 'FlashMessagesController@show');
