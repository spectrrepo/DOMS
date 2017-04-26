<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model {

	protected $table = 'placements';

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	public function posts() {
		return $this->belongsToMany('App\Models\Post', 'posts_placements', 'post_id', 'placement_id');
	}
}
