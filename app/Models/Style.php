<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model {

	protected $table = 'styles';
    public $timestamps = false;
    public $rules = [
        'title' => 'required|max:255',
        'status' => 'required|boolean',
        'image' => 'image',
        'description' => 'required|max:255',
        'full_description' => '',
    ];

    public function posts() {
		return $this->belongsToMany('App\Models\Post', 'posts_styles', 'style_id', 'post_id');
	}

}
