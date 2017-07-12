<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {
	use SoftDeletes;

	protected $table = 'comments';
    public $timestamps = false;
    public $rules = [
        'comment' => 'required|string',
        'post_id' => 'required|integer',
        'status' => 'required|boolean',
    ];

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

	public function post ()
    {
		return $this->belongsTo('App\Models\Post', 'post_id', 'id');
	}
}
