<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $table = 'favorites';
    protected $fillable = ['post_id', 'user_id'];
    protected $dates = ['date'];
    public $timestamps = false;
    public $rules = [
        'post_id' => 'required|integer',
    ];

	public function getDates ()
    {
        return ['date'];
	}

    public function post ()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'id', 'user_id');
	}
}
