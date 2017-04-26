<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $table = 'favorites';
	
	protected $primaryKey = ['post_id', 'user_id'];	

	protected $dates = ['date'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	public $timestamps = true;

	public function post() {
		return $this->belongsToMany('App\Models\Post');
	}

	public function user() {
		return $this->belongsToMany('App\Models\User');
	}
}
