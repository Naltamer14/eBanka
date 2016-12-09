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

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'users'], function()
{
    Route::get('/', 'UsersController@index')->middleware('auth');
    Route::get('/{user}', ['middleware' => ['auth', 'role:admin,Policar'], 'uses' =>'UsersController@show']);
    Route::get('/{user}/edit', 'UsersController@edit')->middleware('auth');
});

Route::resource('accounts', 'AccountsController');

Auth::routes();
