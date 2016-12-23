<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Picture;

use DB;

use Carbon\Carbon;
/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class CommentController extends Controller
{
    /**
     * @param
     *
     * @return
     *
     */
    public function index(){

      $comments = DB::table('Images')
                    ->join('Comments', 'Comments.post_id', '=','Images.id')
                    ->paginate(10);
      return view('moderator.comments', ['comments' => $comments]);

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        $comment = new Comment();

        $comment->post_id = $_POST['post_id'];
        $comment->user_id = $_POST['user_id'];
        $comment->text_comment = $_POST['comment'];
        $image = Picture::find($_POST['post_id']);
        $image->comments_count += 1;
        $image->save();
        $comment->save();
        $lastComment = Comment::orderby('id', 'desc')->first();
        return $lastComment;
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete($id){

      $comment = Comment::find($id);
      $comment->delete();

      return redirect()->back();

    }
}
