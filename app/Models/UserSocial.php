<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocial extends Model {

	use SoftDeletes;

	protected $table = 'users_socials';
	protected $primaryKey = 'user_id';
	protected $dates = ['deleted_at'];
	public $timestamps = false;

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
}
