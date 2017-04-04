<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Codesleeve\Stapler\ORM\StaplerableInterface;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Mail;
use Hash;
use Role;
class User extends Authenticatable implements StaplerableInterface
{
    /**
     * table DB using model
     *
     * @var string
     */
     use EloquentTrait;


     protected $table = 'Users';

     protected $fillable = [ 'name', 'email', 'password', 'status', 'phone'];

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
     /**
     * Функция для получение название роли к которой пользователь принадлежит.
     *
     * @return boolean
     **/
     public function roles()
     {
        return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
     }
     /**
     * Проверка принадлежит ли пользователь к какой либо роли
     *
     * @return boolean
     */
     public function isEmployee()
     {
        $roles = $this->roles->toArray();
        return !empty($roles);
     }
     /**
     * Проверка имеет ли пользователь определенную роль
     *
     * @return boolean
     */
     public function hasRole($check)
     {
         return in_array($check, array_dot($this->roles->toArray(), 'name'));
     }
     /**
     * Получение идентификатора роли
     *
     * @return int
     */
     private function getIdInArray($array, $term)
     {
         foreach ($array as $key => $value) {
            if ($value == $term) {
                 return $key + 1;
            }
         }
         return false;
     }
     /**
     * Добавление роли пользователю
     *
     * @return boolean
     */
     public function makeEmployee($title)
     {
         $assigned_roles = array();
         $roles = array_fetch(Role::all()->toArray(), 'name');
         switch ($title) {
            case 'admin':
                 $assigned_roles[] = $this->getIdInArray($roles, 'admin');
            case 'moderator':
                 $assigned_roles[] = $this->getIdInArray($roles, 'moderator');
            case 'user':
                 $assigned_roles[] = $this->getIdInArray($roles, 'user');
            default:
                 $assigned_roles[] = false;
         }
         $this->roles()->attach($assigned_roles);
     }


     public static function createBySocialProvider($providerUser)
     {

        $password = str_random(12);
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
            'password' => Hash::make( $password ),
            'status' => 'user',
            'phone' => 0
        ]);
     }
}
