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
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
$tasksStoreController = function (){
    $task_title = request('task_title');
    $task = new Task();
    $task->title = $task_title;
    $task->is_done = false;
    $task->save();
    return redirect('/tasks');
};
Route::get('/tasks/store', $tasksStoreController);
