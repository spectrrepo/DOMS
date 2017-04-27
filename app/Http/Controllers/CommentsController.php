<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use App\Models\Comment;

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

    /**
     * @return mixed
     */
    public function dwnldComments()
    {

        $id = $_POST['id'];

        $comments = DB::table('Comments')
            ->select('Comments.id',
                'Users.id AS user_id',
                'Images.id AS image_id',
                'Users.name AS user_name',
                'Users.quadro_ava AS user_quadro_ava',
                'Comments.text_comment AS text_comment',
                'Comments.rus_date AS rus_date' )
            ->join('Users', 'Comments.user_id', '=', 'Users.id')
            ->join('Images', 'Images.id', '=', 'Comments.post_id')
            ->where('Images.id', '=', $id)
            ->andWhere('Comments.status', '=', '"read"')
            ->get();

        return $comments;

    }
}
