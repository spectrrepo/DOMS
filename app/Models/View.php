<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model {

	use SoftDeletes;

	protected $table = 'views';

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];
    
    protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}
	
	public $timestamps = true;

	public function posts() {
		return $this->belongsTo('App\Model\User');
	}	
}
