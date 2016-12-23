<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */

    protected $dates = ['date'];

    public $timestamps = false;
    protected $table = 'slides';
}
