<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model {

	use SoftDeletes;

	protected $table = 'user_socials';

	protected $primaryKey = 'user_id';

	protected $dates = ['deleted_at'];
	
	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\Model\User');
	}
}
