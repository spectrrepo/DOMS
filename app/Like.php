<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */
     protected $dates = ['date'];
     protected $table = 'Likes';
     public $timestamps = false;
}
