<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model {

	use SoftDeletes;

	protected $table = 'views';
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'post_id' => 'required|integer',
        'img' => 'required|image|size:10240',
        'alt' => 'required|max:28',
    ];

    protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}
	
	public function post() {
		return $this->belongsTo('App\Models\Post');
	}	
}
