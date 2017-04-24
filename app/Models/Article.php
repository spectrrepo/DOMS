<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	use SoftDeletes;

	protected $table = 'articles';

	// protected $guarded = ['id'];

	protected $hidden = ['user_add', 'status'];

	// protected $fillable = ['news'];

	protected $dates = ['date', 'deleted_at'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\Model\User');
	}
}
