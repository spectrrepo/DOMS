<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	
	protected $table = 'roles';
    public $timestamps = false;
    public $rules = [
        'name' => 'required|max:80',
        'nickname' => 'required',
        'img' => 'required|image',
        'text' => 'required',
    ];

    public function users() {
		return $this->belongsToMany('App\Models\User', 'users_roles', 'user_id', 'role_id');
	}
}
