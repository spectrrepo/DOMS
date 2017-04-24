<?php

namespace App\Models;

use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
use Role;

class User extends Authenticatable {

	use SoftDeletes;

	protected $table = 'users';

	protected $dates = ['updated_at', 'created_at', 'deleted_at'];

	// protected $fillable = ['username', 'email', 'is_active'];

	// protected $guarded = ['id'];

	protected function getDateFormat() {
 		
 		setlocale(LC_TIME, 'ru_RU.utf8');
        return ('%d %b %Y');
	
	}

	protected $hidden = ['password', 'remember_token'];

	public $timestamps = true;

	/**
	 * Функция для получение название роли к которой пользователь принадлежит.
	 *
	 * @return boolean
	 **/
	public function roles() {
		return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
	}

	/**
	 * Проверка принадлежит ли пользователь к какой либо роли
	 *
	 * @return boolean
	 */
	public function isEmployee() {
		$roles = $this->roles->toArray();
		return !empty($roles);
	}

	/**
	 * Проверка имеет ли пользователь определенную роль
	 *
	 * @return boolean
	 */
	public function hasRole($check) {
		return in_array($check, array_dot($this->roles->toArray(), 'name'));
	}

	/**
	 * Получение идентификатора роли
	 *
	 * @return int
	 */
	
	private function getIdInArray($array, $term) {
		foreach ($array as $key => $value) {
			if ($value == $term) {
				return $key+1;
			}
		}
		return false;
	}

	/**
	 * Добавление роли пользователю
	 *
	 * @return boolean
	 */
	public function makeEmployee($title) {
		$assigned_roles = array();
		$roles          = array_fetch(Role::all()->toArray(), 'name');
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

	public static function createBySocialProvider($providerUser) {

		$password = str_random(12);
		$email    = $providerUser->getEmail();
		$name     = $providerUser->getName();
		Mail::send('emails.welcome', array('name' => $name,
				'e_mail'                                => $email,
				'password'                              => $password),
			function ($message) {
				$message->to($providerUser->getEmail(), $providerUser->getName())
				->subject('Вы зарегистрировались на сайте www.doms.design');
			});
		return self::create([
				'email'    => $email,
				'name'     => $name,
				'password' => Hash::make($password),
				'status'   => 'user',
				'phone'    => 0
			]);
	}
	/**
	 * [articles description]
	 * @return [type] [description]
	 */
	public function articles() {
		return $this->hasMany('App\Model\Article');
	}

	public function slides() {
		return $this->hasMany('App\Model\Slide');
	}

	public function userSocials() {
		return $this->hasMany('App\Model\UserSocial');
	}

	public function claims() {
		return $this->hasMany('App\Model\Claim');
	}

	public function favorites() {
		return $this->hasMany('App\Model\Favorite');
	}

	public function likes() {
		return $this->hasMany('App\Model\Like');
	}

	public function feedbacks() {
		return $this->hasMany('App\Model\Feedback');
	}

	public function userSocialAccounts() {
		return $this->hasMany('App\Model\UserSocialAccount');
	}

	public function images() {
		return $this->hasMany('App\Model\Post');
	}
}
