<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	use SoftDeletes;

	protected $dates = ['date'];

	protected $table = 'comments';

	protected function getDateFormat() {

	}

	public $timestamps = true;
}
