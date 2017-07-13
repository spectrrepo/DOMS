<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Input;

use App\Models\Post;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    /**
     * @return mixed
     */
    public function add ()
    {
        Auth::user()->favorites()->create(['post_id' => Input::get('post_id')]);

        return 'true';
    }

    /**
     * @return string
     */
    public function delete ()
    {
        Auth::user()
            ->favorites()
            ->where('post_id', '=', Input::get('post_id'))
            ->delete();

        return 'true';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $posts =  Post::join('favorites', 'posts.id', '=', 'favorites.post_id')
                       ->where('favorites.user_id', '=', Auth::id())
                       ->get();
        return view('profile.user.posts.favorite', ['images' => $posts]);
    }

    /**
     * @param $id
     * @param $date
     * @return mixed
     */
    public static function newsFavoritesLoad ($id, $date)
    {

        $minutes = Carbon::parse($date)->minute;
        $hours = Carbon::parse($date)->hour;
        $seconds = Carbon::parse($date)->second;

        $dateBegin = Carbon::parse($date)
            ->addSeconds(-$seconds)
            ->addMinutes(-$minutes)
            ->addHours(-$hours);

        $dateEnd = Carbon::parse($dateBegin)
            ->addSeconds(59)
            ->addMinutes(59)
            ->addHours(23);

        return Favorite::join('users', 'users.id', '=', 'favorites.user_id')
                        ->whereBetween('favorites.date', [$dateBegin, $dateEnd])
                        ->where('favorites.post_id', '=', $id)
                        ->where('favorites.date', '=', $date)
                        ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function numFavorites ($id)
    {
        return Favorite::where('post_id', '=', $id)
                       ->count();
    }
}
