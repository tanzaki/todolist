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

use App\Task;

$welcomeController = function () {
    return view('welcome');
};
Route::get('/', $welcomeController);
Route::get('/lists/create', 'ListsController@create')->name( 'lists.create');
Route::get('/lists/store', 'ListsController@store')->name( 'lists.store');
Route::get('/lists', 'ListsController@index')->name( 'lists.index');
//
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
Route::get('/tasks/store', 'TasksController@store');
