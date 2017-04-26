<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Picture;
use App\User;

use DB;

use Carbon\Carbon;

class CommentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $comments = DB::table('Images')
                      ->join('Comments', 'Comments.post_id', '=','Images.id')
                      ->paginate(10);

        return view('moderator.comments', ['comments' => $comments]);

    }

    /**
     * @return string
     */
    public function changeStatus(){

        $id = $_POST['id'];
        $comment = Comment::find($id);
        $comment->status = 'read';
        $comment->save();

        return 'true';

    }

    /**
     * @return Comment
     */
    public function add(){

        $comment = new Comment();
        $comment->post_id = $_POST['post_id'];
        $comment->user_id = $_POST['user_id'];
        $comment->text_comment = $_POST['comment'];
        $comment->save();

        return $comment;
    }

    /**
     * @return string
     */
    public function delete(){

        $id = $_POST['delete_comment_id'];
        $comment = Comment::find($id);
        $comment->delete();

        return 'true';

    }
}
