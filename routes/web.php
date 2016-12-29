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

Route::resource('users', 'UsersController', ['before' => 'guest', 'except' => 'create']);
Route::resource('users.transactions', 'TransactionsController', ['except' => 'destroy']);
Route::resource('users.accounts', 'AccountsController');
Route::resource('groups', 'GroupsController');
Route::resource('users.groups', 'GroupsController', ['except' => ['show', 'edit', 'store', 'update', 'destroy']]);

Route::get('transactions', 'TransactionsController@all')->name('transactions.all');
Route::get('accounts', 'AccountsController@all')->name('accounts.all');

Auth::routes();
