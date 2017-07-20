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
}
