<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model implements StaplerableInterface {

	use EloquentTrait;

	protected $dates = ['date'];

	protected $table = 'slides';

	public $timestamps = false;

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('photo_slider', [
				'styles' => [
					'max'   => '800x800',
					'small' => '300x300'
				]
			]);

		parent::__construct($attributes);
	}

}
