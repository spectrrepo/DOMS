<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Image;

use App\Models\Post;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    /**
     * @return string
     */
    public function add()
    {
        $liked = new Favorite();
        $liked->post_id = $_POST['post_id'];
        $liked->user_id = $_POST['user_id'];
        $liked->date = \Carbon\Carbon::parse();
        $liked->save();

        return 'delete_liked';
    }

    /**
     * @return string
     */
    public function delete()
    {

        Favorite::where('post_id', '=', $_POST['post_id'])
                ->where('user_id', '=', $_POST['user_id'])
                ->delete();

        return 'liked';

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $images =  Post::join('Likeds', 'Images.id', '=', 'Likeds.post_id')
                           ->where('Likeds.user_id', '=', Auth::id())
                           ->get();
            return view('profile.liked', ['images' => $images]);
        }
    }



    /**
     * @return string
     */
    public function loadActiveLiked()
    {
        $id = $_POST['id'];
        if (Auth::check()) {
            $findLiked = Favorite::where('post_id', '=', $id)
                ->where('user_id', '=', Auth::user()->id);
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
