<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;

use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {

        $comments = DB::table('posts')
                      ->join('comments', 'comments.post_id', '=','posts.id')
                      ->join('users', 'users.id', '=', 'comments.user_id')
                      ->paginate(15);

        return view('moderator.comments.list', ['comments' => $comments]);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus ($id)
    {

        $comment = Comment::find($id);
        $comment->status = true;
        $comment->update();
        ModerateHistoriesController::add('comments', $id);

        return redirect()->back()->with('message', 'Комментарий прошел модерацию');

    }

    /**
     * @param Request $request
     * @return Comment
     */
    public function add (Request $request)
    {
        $comment = new Comment();
        $this->validate($request, $comment->rules);

        $comment->post_id = Input::get('post_id');
        $comment->user_id = Input::get('user_id');
        $comment->comment = Input::get('comment');
        $comment->save();

        return $comment;
    }

    /**
     * @param $id
     * @return string
     */
    public function delete ($id)
    {
        Comment::find($id)->softDelete();

        return 'true';
    }

    /**
     * @param int $id
     * @return string
     */
    public static function threeCommentsLoad ($id = 0)
    {
        if ($id === 0) {
            $id = Input::get('id');
        }

        $comments = DB::table('comments')
            ->select('comments.id',
                'users.id AS user_id',
                'post.id AS image_id',
                'users.name AS user_name',
                'users.quadro_ava AS user_quadro_ava',
                'comments.text_comment AS text_comment',
                'comments.rus_date AS rus_date' )
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->where('posts.id', '=', $id)
            ->andWhere('comments.status', '=', 'true')
            ->take(3)
            ->get();

        return $comments;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function numComments ($id)
    {
        $num = Comment::where('post_id', '=', $id)->count();

        return $num;
    }
    /**
     * @return mixed
     */
    public function allCommentsLoad ()
    {
        $id = Input::get('id');

        $comments = DB::table('comments')
            ->select('comments.id',
                'users.id AS user_id',
                'post.id AS image_id',
                'users.name AS user_name',
                'users.quadro_ava AS user_quadro_ava',
                'comments.text_comment AS text_comment',
                'comments.rus_date AS rus_date' )
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->where('posts.id', '=', $id)
            ->andWhere('comments.status', '=', 'true')
            ->skip(3)
            ->get();

        return $comments;

    }


    /**
     * @param $id
     * @param $date
     * @return mixed
     */
    public static function newsThreeCommentLoad ($id, $date)
    {
        $minutes = Carbon::parse($date)->minute;
        $hours = Carbon::parse($date)->hour;
        $seconds = Carbon::parse($date)->second;

        $dateBegin = Carbon::parse($date)
            ->addSeconds(-$seconds)
            ->addMinutes(-$minutes)
            ->addHours(-$hours);

        $dateEnd = Carbon::parse($dateBegin)
            ->addSeconds(59)
            ->addMinutes(59)
            ->addHours(23);

        return Comment::join('users', 'users.id', '=', 'comments.user_id')
                      ->where('comments.post_id', '=', $id)
                      ->whereBetween('favorites.date', [$dateBegin, $dateEnd])
                      ->take(3)
                      ->get();
    }
}
