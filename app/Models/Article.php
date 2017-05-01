<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	use SoftDeletes;
	use \FileSaveTrait;

	protected $table = 'articles';

	protected $hidden = ['user_add', 'status'];

//  protected $guarded = ['id'];

//	protected $fillable = ['news'];

	protected $dates = ['date', 'deleted_at'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\Models\User');
	}
}
