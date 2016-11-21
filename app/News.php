<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Color extends Model implements StaplerableInterface
{
     use EloquentTrait;
    /**
     * table DB using model
     *
     * @var string
     */
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
     protected $table = 'News';
}
