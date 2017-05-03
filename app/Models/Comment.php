<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	use SoftDeletes;

	protected $table = 'comments';
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'comment' => 'required|max:255',
        'user_id' => 'required|integer',
        'post_id' => 'required|integer',
        'status' => 'required|boolean',
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
