<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model {

	protected $table = 'placements';
    public $timestamps = false;
    public $rules = [
        'title' => 'required|max:150',
        'img' => 'image|max:10240',
        'description' => 'string',
        'ful_description' => 'string'
    ];

	public function posts ()
    {
		return $this->belongsToMany('App\Models\Post', 'posts_placements', 'post_id', 'placement_id');
	}
}
