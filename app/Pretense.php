<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Pretense extends Model implements StaplerableInterface
{
     use EloquentTrait;
     public function __construct(array $attributes = array()) {
     $this->hasAttachedFile('photo_pretense', [
     'styles' => [
         'max' => '500x500'
     ]
     ]);

     parent::__construct($attributes);
     }
    /**
     * table DB using model
     *
     * @var string
     */
     protected $dates = ['photo_pretense_updated_at'];
     protected $table = 'copyright';
     public $timestamps = false;

}
