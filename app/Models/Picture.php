<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Picture extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $dates = ['photo_updated_at'];

    protected $table = 'Images';

    protected $fillable = ['photo',
                           'title',
                           'description',
                           'author_id',
                           'user_upload_id',
                           'colors',
                           'variants',
                           'style',
                           'rooms' ];

    public $timestamps = false;

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'max'   => '800x800',
                'small' => '300x300'
            ]
        ]);

        parent::__construct($attributes);
    }

}
