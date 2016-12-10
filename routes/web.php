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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController', ['except' => 'create']);
Route::group(['prefix' => 'users'], function()
{
});
Route::resource('transactions', 'TransactionsController', ['except' => 'destroy']);
Route::resource('accounts', 'AccountsController');

Auth::routes();
