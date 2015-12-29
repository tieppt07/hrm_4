<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('faq', function () {
    return view('static.faq');
});

Route::get('about', function () {
    return view('static.about');
});

Route::get('home', 'HomeController@index');
Route::resource('users', 'UsersController', ['only' => 'index']);
Route::resource('positions', 'PositionsController', ['only' => 'index']);

Route::group(['middleware' => 'admin'], function() {
    Route::resource('users', 'UsersController', ['except' => 'index']);
    Route::resource('positions', 'PositionsController', ['except' => 'index']);
});

Route::group(['namespace' => 'Auth'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::get('login', 'AuthController@getLogin');
        Route::post('login', 'AuthController@postLogin');
        Route::get('logout', 'AuthController@getLogout');

        // Registration routes...
        Route::get('register', 'AuthController@getRegister');
        Route::post('register', 'AuthController@postRegister');
    });
    
    Route::get('emails/password', function() {
        return view('emails/password');
    });

    Route::group(['prefix' => 'password'], function() {
        // Password reset link request routes...
        Route::get('email', 'PasswordController@getEmail');
        Route::post('email', 'PasswordController@postEmail');

        // Password reset routes...
        Route::get('reset/{token}', 'PasswordController@getReset');
        Route::post('reset', 'PasswordController@postReset');
    });
});