<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
	use SoftDeletes;

	protected $table = 'articles';
	protected $hidden = ['user_add', 'status'];
	protected $dates = ['date', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
       'title' => 'bail|required|max:255',
       'description' => 'required|string',
       'description_full' => 'required|string',
       'seo_title' => 'min:50|max:80',
       'seo_keywords' => 'max:250',
       'seo_description' => 'min:150|max:200',
       'image_text' => 'required|string',
       'image' => 'required|image|10240',
       'alt' => 'required|max:28',
       'status' => 'required|boolean',
    ];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

}
