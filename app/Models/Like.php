<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	protected $table = 'likes';
	protected $primaryKey = ['post_id', 'user_id'];
	protected $dates = ['date'];
    public $timestamps = false;
    public $rules = [
        'post_id' => 'required|integer',
    ];

	public function getDates ()
    {
        return ['date'];
	}

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

	public function post ()
    {
		return $this->belongsTo('App\Models\Post', 'post_id', 'id');
	}
}
