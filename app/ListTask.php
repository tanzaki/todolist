<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/20/2017
 * Time: 7:32 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 * @property string title
 * @property Collection tasks
 */
class ListTask extends Model {
	public function tasks() {
		return $this->hasMany( \App\Task::class, 'list_id' );
	}
}
