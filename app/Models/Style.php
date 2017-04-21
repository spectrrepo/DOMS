<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;

use Illuminate\Database\Eloquent\Model;

class Style extends Model implements StaplerableInterface {

	use EloquentTrait;

	protected $table = 'Styles';

	public $timestamps = false;

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('photo', [
				'styles' => [
					'max'   => '500x500'
				]
			]);

		parent::__construct($attributes);
	}

}
