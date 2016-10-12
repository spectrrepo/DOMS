<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */

     protected $table = 'Images';

     public $timestamps = false;
		//  TODO:change this rules and add rules for all models data
}
