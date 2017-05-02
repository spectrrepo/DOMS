<?php

namespace App\Models;

use App\Models\BaseModelForPhoto as BaseModelForPhoto;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends BaseModelForPhoto {
	use SoftDeletes;

	protected $table = 'articles';
	protected $hidden = ['user_add', 'status'];
//  protected $guarded = ['id'];
//	protected $fillable = ['news'];
	protected $dates = ['date', 'deleted_at'];
    public static $photo;

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

//	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

    public static function boot()
    {
        parent::boot();
        static::creating(function() {
            static::photo();
        });
    }

    public static function photo ()
    {
        $this->image = self::saveFile(__CLASS__, 'path_mini', 1);
//      $this->path_middle = $this->saveFile(__CLASS__, 'path_middle', $this->getIncrementing());
//      $this->path_large = $this->saveFile(__CLASS__, 'path_large', $this->getIncrementing());
//      $this->path_square = $this->saveFile(__CLASS__, 'path_square', $this->getIncrementing());
    }

}
