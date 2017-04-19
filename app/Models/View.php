<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class View extends Model implements StaplerableInterface
{
     use EloquentTrait;

    /**
     * table DB using model
     *
     * @var string
     */

     protected $table = 'Views';

     public $timestamps = false;

     public function __construct(array $attributes = array()) {
         $this->hasAttachedFile('photo', [
             'styles' => [
                 'small' => '300x300',
                 'max' => '600x600'
             ]
         ]);

         parent::__construct($attributes);
     }
}
