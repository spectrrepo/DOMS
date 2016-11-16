<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Image extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $fillable = ['photo',
                           'title',
                           'description',
                           'author_id',
                           'user_upload_id',
                           'colors',
                           'variants',
                           'style',
                           'rooms' ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'max'   => '800x800',
                'small' => '300x300'
            ]
        ]);

        parent::__construct($attributes);
    }
    // neeed scope for main controller

    public function scopeColor($query, $colors){
         return $query->where('colors', '=', $colors);
    }

    public function scopeStyle($query, $styles){

         return $query->where('style', '=', $styles);

    }

    public function scopeRoom($query, $rooms){

         return $query->where('rooms', '=', $rooms);

    }

    public function scopeSort($query, $sort)
    {
        # code...
    }
    /**
     * table DB using model
     *
     * @var string
     */

     protected $table = 'Images';

     public $timestamps = false;
}
