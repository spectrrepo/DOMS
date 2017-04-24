<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	protected $table = 'img_likes';

	protected $primaryKey = ['img_id', 'user_id'];

	protected $dates = ['date'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	public $timestamps = true;
	
	public function user() {
		return $this->belongsToMany('App\Models\User');
	}

	public function post() {
		return $this->belongsToMany('App\Models\Post');
	}
}
