<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model {

	protected $table = 'styles';

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	public function images() {
		return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
	}

}
