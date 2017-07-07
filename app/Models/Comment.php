<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {
	use SoftDeletes;

	protected $table = 'comments';
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'comment' => 'required|string',
        'post_id' => 'required|integer',
        'status' => 'required|boolean',
    ];

    public function getDates ()
    {
        return ['date'];
    }

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'id', 'user_id');
	}

	public function post ()
    {
		return $this->belongsTo('App\Models\Post', 'post_id', 'id');
	}
}
