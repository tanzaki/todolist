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
    $tasksTable = $task->getTable();
    echo "<div>Task saving to a row in table '$tasksTable'</div>";
};
Route::get('/tasks/store', $tasksStoreController);
