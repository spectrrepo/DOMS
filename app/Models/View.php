<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class View extends Model implements StaplerableInterface {
	use EloquentTrait;
	use SoftDeletes;
	protected $table = 'Views';

	public $timestamps = false;

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('photo', [
				'styles' => [
					'small' => '300x300',
					'max'   => '600x600'
				]
			]);

		parent::__construct($attributes);
	}
}
