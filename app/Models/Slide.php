<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

	protected $table = 'slides';
	protected $dates = ['date'];
    public $timestamps = false;
    public $rules = [
        'text' => 'required|max:255',
        'img' => 'required|image|size:10240',
        'user_add' => 'required|integer',
        'alt' => 'required|max:28',
    ];

    public function getDates ()
    {
        return ['date'];
    }

    public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_add', 'id');
	}
}
