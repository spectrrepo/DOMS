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

    protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsToMany('App\Models\User');
	}

	public function comments() {
		return $this->belongsToMany('App\Models\Comment');
	}

	public function claims() {
		return $this->belongsToMany('App\Models\Claim');
	}

	public function favorite() {
		return $this->belongsToMany('App\Models\Favorite');
	}

	public function likes() {
		return $this->belongsToMany('App\Models\Like');
	}

	public function views() {
		return $this->belongsTo('App\Models\View');
	}

	public function placements() {
		return $this->belongsToMany('App\Models\Placement', 'posts_placements', 'post_id', 'placement_id');
	}

	public function tags() {
		return $this->belongsToMany('App\Models\Tag', 'posts_tags', 'tag_id', 'post_id');
	}

	public function colors() {
		return $this->belongsToMany('App\Models\Color', 'posts_colors', 'post_id', 'color_id');
	}

	public function styles() {
		return $this->belongsToMany('App\Models\Style', 'posts_styles', 'post_id', 'style_id');
	}
}
