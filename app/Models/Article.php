<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements StaplerableInterface {
	use EloquentTrait;

	protected $table = 'News';

	protected $fillable = ['news'];

	protected $dates = ['news_updated_at'];

	protected function getDateFormat() {

	}

	public $timestamps = true;

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('news', [
				'styles' => [
					'max'   => '800x800',
					'small' => '300x300'
				]
			]);

		parent::__construct($attributes);
	}
}
