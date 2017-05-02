<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
	use SoftDeletes;

	protected $table = 'articles';
	protected $hidden = ['user_add', 'status'];
//	protected $fillable = ['news'];
	protected $dates = ['date', 'deleted_at'];
    public static $photo;

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

}
