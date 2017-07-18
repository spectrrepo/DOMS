<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;
use DB;
use Auth;
use Storage;

use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {

        $comments = Comment::where('status', '=', 0)->paginate(15);

        return view('profile.moderator.comments.list', ['comments' => $comments]);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus ($id)
    {

        $comment = Comment::find($id);
        $comment->status = 1;
        $comment->update();
        ModerateHistoriesController::add('comments', $id);

        return redirect()->back()->with('message', 'Комментарий прошел модерацию');

    }

    /**
     * @return array
     */
    public function add ()
    {
        $comment = new Comment();
        $comment->post_id = Input::get('post_id');
        $comment->user_id = Auth::user()->id;
        $comment->comment = Input::get('comment');
        $comment->save();

        $user = Auth::user()->toArray();

        setlocale(LC_ALL, 'ru_RU.utf8');
        $commentWithUser = [
            'id' => $comment->id,
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_img' => Storage::url($user['img_middle']),
            'comment' => $comment->comment,
            'date' => Carbon::now()->formatLocalized('%d %B %Y г. %H:%M')
        ];
//        dd(Auth::user()->toArray());
        return $commentWithUser;
    }

    /**
     * @param $id
     * @return string
     */
    public function delete ($id)
    {
        Comment::find($id)->delete();

        return redirect()->back()->with('message', 'Комментарий удален');
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
                'posts.id AS image_id',
                'users.name AS user_name',
                'users.img_square AS user_quadro_ava',
                'comments.comment AS text_comment',
                'comments.date AS date' )
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->where('posts.id', '=', $id)
            ->where('comments.status', '=', 'true')
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

        $commentsAll = Post::find($id)->comments;
        $numComments = $commentsAll->count();
        $comments = $commentsAll->take($numComments-3);
        $commentWithUser = [];

        foreach ($comments->reverse() as $item) {
            $itemArray = [
                'id' => $item->id,
                'user_id' => $item->user->id,
                'user_name' => $item->user->name,
                'user_img' => Storage::url($item->user->img_middle),
                'comment' => $item->comment,
                'date' => $item->date //->formatLocalized('%d %B %Y г. %H:%M')
            ];
            array_push($commentWithUser, $itemArray);
        }

        return $commentWithUser;
    }


    /**
     * @param $id
     * @param $date
     * @param bool $bool
     * @return mixed
     */
    public static function newsCommentLoad ($id, $date, $bool = false)
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

        if ($bool === false) {
            $all = Comment::join('users', 'users.id', '=', 'comments.user_id')
                ->where('comments.post_id', '=', $id)
                ->whereBetween('comments.date', [$dateBegin, $dateEnd])
                ->get();
            $allNum = $all->count();
            return $all->slice($allNum - 4);

        } else {
            return Comment::join('users', 'users.id', '=', 'comments.user_id')
                ->where('comments.post_id', '=', $id)
                ->whereBetween('comments.date', [$dateBegin, $dateEnd])
                ->get();
        }

    }
}
