<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageMail extends Model
{
    /**
     * table DB using model
     *
     * @var string
     */

    protected $dates = ['date'];

    public $timestamps = false;
    
    protected $table = 'Message_mail';
}
