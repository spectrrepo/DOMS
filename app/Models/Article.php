<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
	use SoftDeletes;
    protected $table = 'articles';
	protected $hidden = ['user_add', 'status'];
	protected $dates = ['date', 'deleted_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = false;
    public $rules = [
       'title' => 'bail|required|max:255',
       'description' => 'required|string',
       'description_full' => 'required|string',
       'seo_title' => 'min:50|max:80',
       'seo_keywords' => 'max:250',
       'seo_description' => 'min:150|max:200',
       'img' => 'required|image|max:10240',
    ];

    public function getDates ()
    {
        return ['date'];
    }

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_add', 'id');
	}

}
