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
$tasksController = function (){
    echo 'You are here, tasksController';
    echo '<div><a href="/tasks/create">New task</a></div>';
    $tasks = Task::all();
    echo "<div><pre>{$tasks->toJson(JSON_PRETTY_PRINT)}</pre></div>";
};
Route::get('/tasks', $tasksController);
$tasksCreateController = function (){
    echo '
<form action="/tasks/store">
    <input type="text" name="task_title">
    <input type="submit">
</form>
';
};
Route::get('/tasks/create', $tasksCreateController)->name('tasks.create');
$tasksStoreController = function (){
    $task_title = request('task_title');
    $task = new Task();
    $task->title = $task_title;
    $task->is_done = false;
    $task->save();
    return redirect('/tasks');
};
Route::get('/tasks/store', $tasksStoreController);
