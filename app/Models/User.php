<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
use App\Models\Role;
use Auth;
use DB;
class User extends Authenticatable {

	use SoftDeletes;

	protected $table = 'users';
	protected $hidden = ['password', 'remember_token'];
	public $timestamps = true;
    public $rules = [
        'name' => 'required',
        'sex' => 'in:man,woman',
        'skype' => 'alpha_dash',
        'about' => 'string',
        'phone' => 'integer',
        'vk_id' => 'string',
        'fb_id' => 'string',
        'img' => 'image|max:82240',
        'seo_title' => 'min:50|max:80',
        'seo_keywords' => 'max:250',
        'seo_description' => 'min:150|max:200',
        'alt' => 'max:28',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function roles ()
    {
		return $this->belongsToMany('App\Models\Role', 'users_roles', 'user_id', 'role_id');
	}

    /**
     * @param $check
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function hasRole ($check)
    {
        $role_id = DB::table('users_roles')
                     ->where('user_id', '=', Auth::id())
                     ->first();

        if (!isset($role_id)) {
            return redirect('/');
        }

        $userRole = DB::table('roles')
                       ->where('id', '=', $role_id->role_id)
                       ->first()->name;
        if ($check === "0") {
            return false;
        }
        $needRole = Role::where('nickname', '=', $check)->first()->name;

        return $userRole === $needRole;
	}

	public static function createBySocialProvider ($providerUser)
    {
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function articles ()
    {
		return $this->hasMany('App\Models\Article', 'id', 'user_add');
	}

	public function slides ()
    {
		return $this->hasMany('App\Models\Slide', 'id', 'user_add');
	}

	public function userSocials ()
    {
		return $this->hasMany('App\Models\UserSocial', 'user_id', 'id');
	}

	public function claims ()
    {
		return $this->hasMany('App\Models\Claim', 'id', 'user_id');
	}

	public function favorites ()
    {
		return $this->hasMany('App\Models\Favorite', 'user_id', 'id');
	}

	public function likes ()
    {
		return $this->hasMany('App\Models\Like', 'user_id', 'id');
	}

	public function feedbacks ()
    {
		return $this->hasMany('App\Models\Feedback', 'user_answer', 'id');
	}

	public function userSocialAccounts ()
    {
		return $this->hasMany('App\Models\UserSocialAccount');
	}

	public function posts ()
    {
		return $this->hasMany('App\Models\Post', 'id', 'author_id');
	}

	public function comments ()
    {
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }
}
