<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model {
	
	protected $table = 'users_social_account';
	protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;
    public $rules = [
        'user_id' => 'required|integer',
        'provider_user_id' => '',
        'provider' => '',
    ];

    protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsTo(User::class );
	}	
}
