<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;

use App\Models\Post;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    /**
     * @return string
     */
    public function add ()
    {
        $liked = new Favorite();
        $liked->post_id = Input::get('post_id');
        $liked->user_id = Auth()->user()->id;
        $liked->save();

        return 'true';
    }

    /**
     * @return string
     */
    public function delete ()
    {
        Favorite::where('post_id', '=', Input::get('post_id'))
                ->where('user_id', '=', Auth()->user()->id)
                ->delete();

        return 'liked';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $posts =  Post::join('favorites', 'posts.id', '=', 'favorites.post_id')
                       ->where('favorites.user_id', '=', Auth::id())
                       ->get();
        return view('profile.favorite.list', ['images' => $posts]);
    }



    /**
     * @return string
     */
    public function loadActiveLiked ()
    {
        $id = Input::get('id');
        if (Auth::check()) {
            $findLiked = Favorite::where('post_id', '=', $id)
                                 ->where('user_id', '=', Auth()->user()->id);
            if ( $findLiked->count() !== 0 ) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        }else {
            $response = 'error';
        }

        return $response;
    }
}
