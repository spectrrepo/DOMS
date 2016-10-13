<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Image extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $fillable = ['photo'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'max'   => '800x800',
                'small' => '300x300'
            ]
        ]);

        parent::__construct($attributes);
    }
    /**
     * table DB using model
     *
     * @var string
     */

     protected $table = 'Images';

     public $timestamps = false;
		//  TODO:change this rules and add rules for all models data
}
