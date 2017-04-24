<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model {
	use SoftDeletes;

	protected $table = 'claims';

	// Разрешить массовое присваивание значений для этих полей
	// protected $fillable = ['username', 'email', 'is_active'];

	// Запретить mass assigned для этих полей
	// protected $guarded = ['id'];

	protected $dates = ['date', 'deleted_at'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}
	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\Model\User');
	}

	public function image() {
		return $this->belongsTo('App\Model\Post');
	}

}
