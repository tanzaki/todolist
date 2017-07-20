<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/20/2017
 * Time: 6:27 PM
 */

namespace App\Http\Controllers;

class TasksController extends Controller {
	function index(){
		echo 'You are here, tasksController';
		echo '<div><a href="/tasks/create">New task</a></div>';
		$tasks = \App\Task::all();
		echo "<div><pre>{$tasks->toJson(JSON_PRETTY_PRINT)}</pre></div>";
	}
	function create(){
		echo '
<form action="/tasks/store">
    <input type="text" name="task_title">
    <input type="hidden" name="list_id" value="0">
    <input type="submit">
</form>
';
	}
	function store(){
		$task_title = request('task_title');
		$task = new \App\Task();
		$task->title = $task_title;
		$task->is_done = false;
		$task->list_id = request('list_id');
		$task->save();
		return redirect('/tasks');
	}
}
