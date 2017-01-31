<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Codesleeve\Stapler\ORM\StaplerableInterface;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Mail;
use Hash;

class User extends Authenticatable implements StaplerableInterface
{
    /**
     * table DB using model
     *
     * @var string
     */
     use EloquentTrait;


     protected $table = 'Users';
     protected $fillable = ['email', 'name', 'password', 'status', 'phone'];
     public $timestamps = false;

     public function __construct(array $attributes = array()) {
         $this->hasAttachedFile('avatar', [
             'styles' => [
                 'small'   => '60x60',
                 'max' => '300x300'
             ]
         ]);

         parent::__construct($attributes);
     }

     public static function createBySocialProvider($providerUser)
     {

        $password = Hash::make( str_random(12) );
        $email = $providerUser->getEmail();
        $name = $providerUser->getName();
        Mail::send('emails.welcome', array('name' => $name,
                                           'e_mail' => $email,
                                           'password' => $password),
        function($message)
        {
          $message->to($providerUser->getEmail(), $providerUser->getName())
          ->subject('Вы зарегистрировались на сайте www.doms.design');
        });
        return self::create([
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'status' => 'user',
            'phone' => 0
        ]);
     }
}
