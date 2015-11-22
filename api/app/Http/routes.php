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

Event::listen('illuminate.query', function($query)
{
    //var_dump($query);
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'webapi'], function () {
    Route::post('user/login', 'UserController@login');
    Route::post('user/register','UserController@registerUser');
    Route::resource('user', 'UserController');
    
    
});

Route::group(['prefix' => 'mobileapi'], function () {
    Route::post('user/login', 'UserController@login');
    Route::resource('user', 'UserController');
});