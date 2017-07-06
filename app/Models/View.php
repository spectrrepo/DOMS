<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends Model {

	use SoftDeletes;

	protected $table = 'views';
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'post_id' => 'required|integer',
        'img' => 'required|image|size:10240',
        'alt' => 'required|max:28',
    ];

    public function getDates ()
    {
        return ['date'];
	}
	
	public function post ()
    {
		return $this->belongsTo('App\Models\Post', 'post_id', 'id');
	}	
}
