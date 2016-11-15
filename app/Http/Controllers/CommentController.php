<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

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
    public function delete(){

    }
}
