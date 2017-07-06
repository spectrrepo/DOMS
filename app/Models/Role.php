<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	
	protected $table = 'roles';
    public $timestamps = false;
    public $rules = [
        'name' => 'required|max:80',
        'nickname' => 'required|string',
        'img' => 'required|image|size:10240',
        'text' => 'required|string',
        'alt' => 'required|max:28',
    ];

    public function users ()
    {
		return $this->belongsToMany('App\Models\User', 'users_roles', 'user_id', 'role_id');
	}
}
