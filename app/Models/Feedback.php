<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
	use SoftDeletes;

	protected $table = 'feedbacks';
    
    protected $dates = ['date_ask', 'date_answer', 'deleted_at'];

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
