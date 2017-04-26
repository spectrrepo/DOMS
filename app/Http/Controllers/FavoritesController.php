<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Picture;
use Image;
use App\Liked;

class FavoritesController extends Controller
{
    /**
     * @return string
     */
    public function add()
    {
        $liked = new Liked();
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

        $liked = Liked::where('post_id', '=', $_POST['post_id'])
                      ->where('user_id', '=', $_POST['user_id']);
        $liked->delete();

        return 'liked';

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $images =  Picture::join('Likeds', 'Images.id', '=', 'Likeds.post_id')
                               ->where('Likeds.user_id', '=', Auth::id())
                               ->get();
            return view('profile.liked', ['images' => $images]);
        }
    }
}
