<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model {

	protected $table = 'styles';

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	public function posts() {
		return $this->belongsToMany('App\Models\Post', 'posts_styles', 'style_id', 'post_id');
	}

}
