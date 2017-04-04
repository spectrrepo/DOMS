<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class NewsVariant extends Model implements StaplerableInterface
{
     use EloquentTrait;
    /**
     * table DB using model
     *
     * @var string
     */
    protected $table = 'News_variant_photo';

    protected $fillable = ['news_variant'];

    public $timestamps = false;

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('news_variant', [
            'styles' => [
                'max'   => '800x800',
            ]
        ]);

        parent::__construct($attributes);
    }
}
