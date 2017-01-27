<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Slides extends Model implements StaplerableInterface
{
    /**
     * table DB using model
     *
     * @var string
     */
    use EloquentTrait;

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('photo_slider', [
            'styles' => [
                'max'   => '800x800',
                'small' => '300x300'
            ]
        ]);

        parent::__construct($attributes);
    }
    protected $dates = ['date'];

    public $timestamps = false;
    protected $table = 'slides';
}
