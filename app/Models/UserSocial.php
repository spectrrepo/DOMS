<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model {

	use SoftDeletes;

	protected $table = 'user_socials';
	protected $primaryKey = 'user_id';
	protected $dates = ['deleted_at'];
	public $timestamps = false;
    public $rules = [
        'user_id' => 'required|integer',
        'link' => 'required|active_url',
    ];

	public function user() {
		return $this->belongsTo('App\Models\User');
	}
}
