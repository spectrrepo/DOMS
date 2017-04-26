<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	
	protected $table = 'roles';

	public function users() {
		return $this->belongsToMany('App\Models\User', 'users_roles', 'user_id', 'role_id');
	}
}
