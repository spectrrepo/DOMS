<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;

use App\Models\Like;
use App\Models\User;

class LikesController extends Controller
{
    /**
     * @return mixed
     */
    public function add ()
    {

        $like = new Like();
        $like->post_id = Input::get('post_id');
        $like->user_id = Auth()->user()->id;
        $like->save();

        $countLike = count( Like::find($_POST['post_id']) );

        return $countLike;
    }

    /**
     * @return string
     */
    public function delete ()
    {

        Like::where('post_id', '=', Input::get('id'))
            ->where('user_id', '=', Auth()->user()->id)
            ->delete();

        return 'true';
    }

    /**
     * @return array
     */
    public function loadAllLikes ()
    {

        $id = Input::get('id');
        $likes = Like::where('post_id', '=', $id)->get();

        $likeWhom = array();
        foreach ($likes as $like) {
            $user = User::select('id', 'name', 'img_square')
                        ->where('id', '=', $like->user_id)
                        ->get();
            array_push( $likeWhom, $user);
        }

        return $likeWhom;
    }

    /**
     * @param $id
     * @return array
     */
    public static function loadLikeWhomThree ($id)
    {

        $likes = Like::where('post_id', '=', $id)->take(3)->get();

        $likeWhom = array();
        foreach ($likes as $like) {
            $user = User::select('id', 'name', 'img_square')
                ->where('id', '=', $like->user_id)
                ->get();
            array_push( $likeWhom, $user);
        }

        return $likeWhom;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function numLikes ($id)
    {
        $num = Like::where('post_id', '=', $id)
                   ->count();

        return $num;
    }

    /**
     * @param $id
     * @param $date
     * @return mixed
     */
    public static function newsLikesLoad ($id, $date)
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

        return Like::join('users', 'users.id', '=', 'favorites.user_id')
                    ->whereBetween('favorites.date', [$dateBegin, $dateEnd])
                    ->where('favorites.post_id', '=', $id)
                    ->get();
    }
}
