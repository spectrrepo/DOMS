<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Like;
use App\Picture;
// checked
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
        setlocale(LC_TIME, 'ru_RU.utf8');

        $like = new Like();
        $like->post_id = $_POST['post_id'];
        $like->user_id = $_POST['user_id'];
        $like->date_rus = \Carbon\Carbon::parse()->formatLocalized('%d %b %Y');
        $like->save();

        $countLike = Picture::find($_POST['post_id'])->likes_count;

        return $countLike;
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete(){

        $like = Like::where('post_id', '=', $_POST['post_id'])
                    ->where('user_id', '=', $_POST['user_id']);
        $like->delete();

        return 'true';
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
