<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
     return View::make('loginForm');
});

Route::get('login', function()
{
    return View::make('loginForm');
});

Route::get('admin', array('before' => 'auth', function()
{
    return View::make('adminPage');
}));

Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/');
});

Route::post('/', 'HomeController@user');

Route::resource('topics', 'TopicController');

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('getTopics', 'TopicAPIController');
});