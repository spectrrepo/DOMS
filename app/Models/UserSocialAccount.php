<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model {
	
	protected $table = 'users_social_account';
	protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;

    protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsTo(User::class );
	}	
}
