<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model {

	protected $table = 'colors';
	protected $hidden = ['id'];
    public $timestamps = false;
    public $rules = [
        'title' => 'required|max:80',
        'hash' => 'required',
    ];

	public function images() {
		return $this->belongsToMany('App\Models\Post', 'posts_colors', 'post_id', 'color_id');
	}
}
