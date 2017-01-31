<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Codesleeve\Stapler\ORM\StaplerableInterface;

use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Authenticatable implements StaplerableInterface
{
    /**
     * table DB using model
     *
     * @var string
     */
     use EloquentTrait;


     protected $table = 'Users';
     protected $fillable = ['email', 'name'];
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
        return self::create([
            'email' => $providerUser->getEmail(),
            'name' => $providerUser->getName(),
        ]);
     }
}
