<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
	use SoftDeletes;

	protected $table = 'feedbacks';
    protected $dates = ['date_ask', 'date_answer', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required|max:255',
        'answer' => 'max:255',
    ];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsToMany('App\Models\User');
	}
}
