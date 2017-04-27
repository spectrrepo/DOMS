<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Like;

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

        $countLike = count( Like::find($_POST['post_id']) );

        return $countLike;
    }

    /**
     * @return string
     */
    public function delete(){

        Like::where('post_id', '=', $_POST['post_id'])
            ->where('user_id', '=', $_POST['user_id'])
            ->delete();

        return 'true';
    }

    /**
     * @return int
     */
    public function index(){

        $num_like = count(Like::all());

        return $num_like;

    }


    /**
     * @return array
     */
    public function dwnldLikeWhom()
    {

        $id = $_POST['id'];
        $likes = Like::where('post_id', '=', $id)->get();

        $likeWhom = array();
        foreach ($likes as $like) {
            $user = User::select('id', 'name', 'quadro_ava')
                ->where('id', '=', $like->user_id)
                ->get();
            array_push( $likeWhom, $user);
        }

        return $likeWhom;
    }



    /**
     * @return string
     */
    public function loadActiveLike()
    {
        $id = $_POST['id'];
        if (Auth::check()) {
            $findLike = Like::where('post_id', '=', $id)
                ->andWhere('user_id', '=', Auth::user()->id);
            if ( $findLike->count() !== 0 ) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        }else {
            $response = 'error';
        }

        return $response;
    }



    /**
     * @return array
     */
    public function loadAllLikes ()
    {
        $id = $_POST['id'];
        $allLikes = Like::where('post_id', '=', $id)->get();

        $likeWhom = array();
        foreach ($allLikes as $like) {
            $user = User::find($like->user_id);
            array_push( $likeWhom, $user);
        }

        return $likeWhom;
    }
}
