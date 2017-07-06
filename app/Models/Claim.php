<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model {
	use SoftDeletes;

	protected $table = 'claims';
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'text' => 'required|max:255',
        'file' => 'required|image|size:10240',
        'post_id' => 'required|integer',
        'status' => 'required|boolean',
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
