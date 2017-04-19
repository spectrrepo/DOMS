<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liked extends Model
{

     protected $table = 'favorites';
     
     public $timestamps = true;
}
