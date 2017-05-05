<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	protected $table = 'likes';
	protected $primaryKey = ['post_id', 'user_id'];
	protected $dates = ['date'];
    public $timestamps = false;
    public $rules = [
        'post_id' => 'required|integer',
    ];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsToMany('App\Models\User');
	}

	public function post() {
		return $this->belongsToMany('App\Models\Post');
	}
}
