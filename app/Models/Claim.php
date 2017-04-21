<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model implements StaplerableInterface {
	use EloquentTrait;
	use SoftDeletes;

	protected $dates = ['photo_pretense_updated_at'];

	protected $table = 'copyright';

	public $timestamps = false;

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('photo_pretense', [
				'styles' => [
					'max'   => '500x500'
				]
			]);

		parent::__construct($attributes);
	}

}
