<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

	protected $table = 'slides';

	protected $dates = ['date'];

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\Models\User');
	}
}
