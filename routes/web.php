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

Route::get('groups', 'GroupsController@index')->name('groups.index')->middleware('permission:groups-read');
Route::get('groups/create', 'GroupsController@create')->name('groups.create')->middleware('permission:groups-create');
Route::post('groups', 'GroupsController@store')->name('groups.store')->middleware('permission:groups-create');
//Route::get('groups/{group}', 'GroupsController@show')->name('groups.show')->middleware('permission:groups-read');
//Route::get('groups/{group}/edit', 'GroupsController@edit')->name('groups.edit')->middleware('permission:groups-update');
//Route::put('groups/{group}', 'GroupsController@update')->name('groups.update')->middleware('permission:groups-update');
//Route::patch('groups/{group}', 'GroupsController@update')->name('groups.update')->middleware('permission:groups-update');
//Route::get('groups/{group}', 'GroupsController@destroy')->name('groups.destroy')->middleware('permission:groups-delete');

Route::get('transactions', 'TransactionsController@all')->name('transactions.all');
Route::get('accounts', 'AccountsController@all')->name('accounts.all');


Route::resource('users', 'UsersController', ['before' => 'guest', 'except' => 'create']);
Route::resource('users.transactions', 'TransactionsController', ['except' => 'destroy']);
Route::resource('users.accounts', 'AccountsController');
Route::resource('groups', 'GroupsController', ['except' => ['index', 'create', 'store']]);
Route::resource('users.groups', 'GroupsController', ['except' => ['show', 'edit', 'store', 'update', 'destroy']]);


Auth::routes();
