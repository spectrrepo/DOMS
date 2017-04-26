<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	protected $hidden = ['lang', 'value_en'];

	public function images() {
		return $this->belongsToMany('App\Models\Post', 'posts_tags', 'post_id', 'tag_id');
	}

}
