<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Like;
use App\Picture;

class LikesController extends Controller
{
    /**
     * @return mixed
     */
    public function add(){

        $like = new Like();
        $like->post_id = $_POST['post_id'];
        $like->user_id = $_POST['user_id'];
        $like->save();

        $countLike = Picture::find($_POST['post_id'])->likes_count;

        return $countLike;
    }

    /**
     * @return string
     */
    public function delete(){

        $like = Like::where('post_id', '=', $_POST['post_id'])
            ->where('user_id', '=', $_POST['user_id']);
        $like->delete();

        return 'true';
    }

    /**
     * @return int
     */
    public function index(){

        $Likes = Like::all();
        $num_like = count($like);

        return $num_like;

    }
}
