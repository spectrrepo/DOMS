<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModerateHistory extends Model {

	protected $table = 'moderate_history';
	protected $dates = ['date'];
    public $timestamps = false;
    public $rules = [
        'object' => 'required|in:claims,posts,comments',
        'object_id' => 'required|integer',
        'user_id' => 'required|integer',
    ];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsToMany('App\Models\User');
	}
}