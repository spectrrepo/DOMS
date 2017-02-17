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

        $comment = new Comment();

        $comment->post_id = $_POST['post_id'];
        $comment->user_id = $_POST['user_id'];
        $comment->text_comment = $_POST['comment'];
        $image = Picture::find($_POST['post_id']);
        $image->comments_count += 1;
        setlocale(LC_TIME, 'ru_RU.utf8');
        $comment->rus_date = \Carbon\Carbon::parse(\Carbon\Carbon::now())->formatLocalized('%d %b %Y');
        $image->save();
        $comment->save();
        $lastComment = DB::select('SELECT Comments.id,
                                       Users.id AS user_id,
                                       Images.id AS image_id,
                                       Users.name AS user_name,
                                       Users.quadro_ava AS user_quadro_ava,
                                       Comments.text_comment AS text_comment,
                                       Comments.rus_date AS rus_date
                                FROM   Comments JOIN Users
                                ON     Comments.user_id=Users.id
                                JOIN   Images ON Images.id = Comments.post_id
                                WHERE  Images.id='.$_POST['post_id'].
                                ' ORDER BY id DESC LIMIT 1;');
        return $lastComment;
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
