<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
	use SoftDeletes;
	protected $dates = ['date'];

	public $timestamps = false;

	protected $table = 'Message_mail';
}
