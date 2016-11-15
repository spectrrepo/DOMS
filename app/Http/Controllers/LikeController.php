<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Like;

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class LikeController extends Controller
{
    /**
     * @param
     *
     * @return
     *
     */
    public function add(){
        $like = new Like();

        $like->post_id = $_POST['post_id'];
        $like->user_id = $_POST['user_id'];

        $like->save();
        $countLike = count( Like::where('post_id', '=', $_POST['post_id'])->get());
        return $countLike;
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete(){

    }

    /**
     * @param
     *
     * @return
     */
    public function index(){

        $Likes = Like::all();
        $num_like = count($like);
        return $num_like;

    }
}
