<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

     protected $dates = ['date'];

     protected $table = 'likes';

     public $timestamps = true;
}
