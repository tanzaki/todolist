<?php
use App\ListTask;

$list_id = request('list_id');
$list = \App\ListTask::find( $list_id );
/** @var ListTask $list */
echo "New task to <em>$list->title</em>";
echo '
<form action="/tasks/store">
    <input type="text" name="task_title">
    <input type="hidden" name="list_id" value="' . $list_id . '">
    <input type="submit">
</form>
';
