<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements StaplerableInterface {
	use EloquentTrait;
	use SoftDeletes;

	protected $dates = ['photo_updated_at'];

	protected $table = 'Images';

	protected $fillable = ['photo',
		'title',
		'description',
		'author_id',
		'user_upload_id',
		'colors',
		'variants',
		'style',
		'rooms'];
	protected function getDateFormat() {

	}

	public $timestamps = false;

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('photo', [
				'styles' => [
					'max'   => '800x800',
					'small' => '300x300'
				]
			]);

		parent::__construct($attributes);
	}

}
