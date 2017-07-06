<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModerateHistory extends Model {

	protected $table = 'moderate_history';
	protected $dates = ['date'];
    public $timestamps = false;
    public $rules = [
        'object' => 'required|in:claims,posts,comments',
        'object_id' => 'required|integer',
    ];

	public function getDates ()
    {
        return ['date'];
	}

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
}