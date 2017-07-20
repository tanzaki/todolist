<?php
use App\ListTask;
/** @var ListTask $list */
?>
New task to <em>{{$list->title}}</em>
<form action="/tasks/store">
    <input type="text" name="task_title">
    <input type="hidden" name="list_id" value="{{$list->id}}">
    <input type="submit">
</form>
