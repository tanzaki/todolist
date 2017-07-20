<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/20/2017
 * Time: 7:09 PM
 */

namespace App\Http\Controllers;

use App\ListTask;

class ListsController extends Controller {
	function create() {
		$route_new_list = route( 'lists.create');
		$route_lists    = route( 'lists.index');
		echo "
<div><a href='{$route_lists}'>Lists</a></div>
<div><a href='{$route_new_list}'>New list</a></div>
";
		?>
		<h4>New list</h4>
        <form action="<?php echo route( 'lists.store') ?>">
            <input type="text" title="" name="list_name">
            <input type="submit" value="Send">
        </form>
		<?php
	}
	function store(){
	    $list_task = new ListTask();
	    $list_task->title = request('list_name');
	    $list_task->save();
	    return redirect()->route( 'lists.index');

    }
    function index(){
	    $route_new_list = route( 'lists.create');
	    $route_lists    = route( 'lists.index');
	    echo "
<div><a href='{$route_lists}'>Lists</a></div>
<div><a href='{$route_new_list}'>New list</a></div>
";
	    echo "<pre>";
	    $lists = ListTask::all();
	    foreach ($lists as $list){
		    echo gettype( $list );
		    echo get_class( $list );
		    echo $list->toJson(JSON_PRETTY_PRINT);
	    }
	    echo "</pre>";

    }
}
