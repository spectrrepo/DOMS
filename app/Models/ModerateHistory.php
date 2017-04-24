<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModerateHistory extends Model {
	protected $table = 'moderate_history';

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
}