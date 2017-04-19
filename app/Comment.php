<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $dates = ['date'];

    protected $table = 'Comments';

    public $timestamps = true;
}
