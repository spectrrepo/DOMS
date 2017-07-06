<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	use SoftDeletes;

	protected $table = 'posts';
	protected $dates = ['updated_at', 'created_at', 'deleted_at'];
    public $timestamps = true;
    public $rules = [
        'title' => 'required|max:255',
        'description' => 'required|string',
        'img' => 'required|image|max:82240',
        'views' => 'integer',
        ];

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'author_id', 'id');
	}

	public function comments ()
    {
		return $this->belongsTo('App\Models\Comment', 'post_id', 'id');
	}

	public function claims ()
    {
		return $this->belongsTo('App\Models\Claim', 'id', 'post_id');
	}

	public function favorite ()
    {
		return $this->hasMany('App\Models\Favorite', 'post_id', 'id');
	}

	public function likes ()
    {
		return $this->hasMany('App\Models\Like', 'post_id', 'id');
	}

	public function views ()
    {
		return $this->hasMany('App\Models\View', 'post_id', 'id');
	}

	public function placements ()
    {
		return $this->belongsToMany('App\Models\Placement', 'posts_placements', 'post_id', 'placement_id');
	}

	public function tags ()
    {
		return $this->belongsToMany('App\Models\Tag', 'posts_tags', 'post_id', 'post_id');
	}

	public function colors ()
    {
		return $this->belongsToMany('App\Models\Color', 'posts_colors', 'post_id', 'color_id');
	}

	public function styles ()
    {
		return $this->belongsToMany('App\Models\Style', 'posts_styles', 'post_id', 'style_id');
	}
}
