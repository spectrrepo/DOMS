<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;

use Codesleeve\Stapler\ORM\EloquentTrait;

class Style extends Model implements StaplerableInterface
{
    /**
     * table DB using model
     *
     * @var string
     */
     use EloquentTrait;

     public $timestamps = false;
     public function __construct(array $attributes = array()) {
         $this->hasAttachedFile('photo', [
             'styles' => [
                 'max' => '500x500'
             ]
         ]);

         parent::__construct($attributes);
     }

     protected $table = 'Styles';

}
