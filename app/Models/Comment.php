<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */
    protected $dates = ['date'];

    protected $table = 'comments';

    public $timestamps = true;
}
