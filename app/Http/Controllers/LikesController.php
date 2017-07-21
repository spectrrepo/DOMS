<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Input;

use App\Models\Like;
use App\Models\User;
use Auth;
use function spec\Laracasts\Generators\Migrations\getStub;

class LikesController extends Controller
{
    /**
     * @return mixed
     */
    public function add ()
    {
        Auth::user()->likes()->create(['post_id' => Input::get('post_id')]);
        $countLike = count( Like::where('post_id', '=', Input::get('post_id'))->get());
        return $countLike;
    }

    /**
     * @return string
     */
    public function delete ()
    {
        Auth::user()
            ->likes()
            ->where('post_id', '=', Input::get('post_id'))
            ->delete();

        $countLike = count( Like::find($_POST['post_id']) );

        return $countLike;
    }

    /**
     * @return array
     */
    public function loadAllLikes ()
    {
        $id = Input::get('id');

        $likes = Post::find($id)->likes;
        $likesWithUser = [];

        foreach ($likes as $item) {
            $itemArray = [
                'id' => $item->id,
                'user_id' => $item->user->id,
                'user_name' => $item->user->name,
                'user_img' => Storage::url($item->user->img_middle),
                'comment' => $item->comment,
                'date' => $item->date //->formatLocalized('%d %B %Y г. %H:%M')
            ];
            array_push($likesWithUser, $itemArray);
        }

        return $likesWithUser;
    }

    /**
     * @param $id
     * @return array
     */
    public static function loadLikeWhomThree ($id)
    {
        $likes = Like::where('post_id', '=', $id)->take(3)->get();
        $like = new Like();
        $likeWhom = array();
        foreach ($likes as $like) {
            $user = $like->user;
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

        return Like::join('users', 'users.id', '=', 'likes.user_id')
                    ->whereBetween('likes.date', [$dateBegin, $dateEnd])
                    ->where('likes.post_id', '=', $id)
                    ->get()->map(function ($item){
                        return [
                            "id" => $item->id,
                            "user_id" => $item->user_id,
                            "date" => $item->date,
                            "name" => $item->name,
                            "sex" => $item->sex,
                            "img_middle" => Storage::url($item->img_middle),
                        ];
            });
    }
}
