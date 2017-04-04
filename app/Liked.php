<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liked extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */

     protected $table = 'Likeds';
     
     public $timestamps = false;
}
