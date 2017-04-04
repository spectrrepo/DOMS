<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Picture;
use App\User;

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
    public function changeStatus(){

      $id = $_POST['id'];
      $comment = Comment::find($id);
      $comment->status = 'read';
      $comment->save();

      return 'true';

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        setlocale(LC_TIME, 'ru_RU.utf8');

        $comment = new Comment();
        $comment->post_id = $_POST['post_id'];
        $comment->user_id = $_POST['user_id'];
        $comment->text_comment = $_POST['comment'];
        $comment->rus_date = \Carbon\Carbon::parse(\Carbon\Carbon::now())->formatLocalized('%d %b %Y');
        $comment->save();

        return $comment;
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete(){

      $id = $_POST['delete_comment_id'];
      $comment = Comment::find($id);
      $comment->delete();

      return 'true';

    }
}
