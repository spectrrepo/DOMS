<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';
	protected $hidden = ['lang', 'value_en'];
    public $timestamps = false;
    public $rules = [
        'value' => 'required|max:100',
        'lang' => 'required|in:en,ru',
        'value_en' => 'required:alpha',
    ];

    public function images() {
		return $this->belongsToMany('App\Models\Post', 'posts_tags', 'post_id', 'tag_id');
	}

}
