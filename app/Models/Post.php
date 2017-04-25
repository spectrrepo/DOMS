<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	use SoftDeletes;

	protected $table = 'posts';

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	protected $dates = ['updated_at', 'created_at', 'deleted_at'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public $timestamps = true;

	public function user() {
		return $this->belongsToMany('App\Models');
	}

	public function comments() {
		return $this->belongsToMany('App\Models');
	}

	public function claims() {
		return $this->belongsToMany('App\Models');
	}

	public function favorite() {
		return $this->belongsToMany('App\Models');
	}

	public function likes() {
		return $this->belongsToMany('App\Models');
	}

	public function views() {
		return $this->belongsTo('App\Model\User');
	}

	public function placements() {
		return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
	}

	public function tags() {
		return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
	}

	public function colors() {
		return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
	}

	public function styles() {
		return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
	}
}
