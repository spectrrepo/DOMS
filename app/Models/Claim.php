<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model {
	use SoftDeletes;

	protected $table = 'claims';
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'title' => 'required|max:255',
        'file' => 'required|image|size:100',
        'user_id' => 'required|integer',
        'post_id' => 'required|integer',
        'status' => 'required|boolean',
    ];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

	public function post() {
		return $this->belongsTo('App\Models\Post');
	}

}
