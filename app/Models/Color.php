<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model {

	protected $table = 'colors';

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	protected $hidden = ['id'];

	public function images() {
		return $this->belongsToMany('App\Models\Post', 'posts_colors', 'post_id', 'color_id');
	}
}
