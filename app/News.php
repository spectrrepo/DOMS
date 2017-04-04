<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class News extends Model implements StaplerableInterface
{
     use EloquentTrait;
    /**
     * table DB using model
     *
     * @var string
     */
    protected $table = 'News';

    protected $fillable = ['news'];

    protected $dates = ['news_updated_at'];

    public $timestamps = false;

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('news', [
            'styles' => [
                'max'   => '800x800',
                'small' => '300x300'
            ]
        ]);

        parent::__construct($attributes);
    }
}
