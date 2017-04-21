<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model {

	use SoftDeletes;
	protected $table = 'user_socials';

	public $timestamps = false;

}
