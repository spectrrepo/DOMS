<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	use SoftDeletes;

	protected $table = 'comments';

	protected $dates = ['date', 'deleted_at'];

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
