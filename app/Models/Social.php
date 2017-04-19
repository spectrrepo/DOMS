<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */
     protected $table = 'user_socials';

     public $timestamps = false;

}
