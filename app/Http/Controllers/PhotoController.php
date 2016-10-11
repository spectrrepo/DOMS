<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Image;

use App\Comment;

use App\Tag;

use App\View;

use App\Like;
/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class PhotoController extends Controller
{

    /**
     * @param
     *
     * @return
     *
     */
    public function index(){

        $images = Image::all();
        return view('site.index', ['images' => $images]);

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function indexItem($id){

        $image = Image::find($id);

        $tags = Tag::where('post_id', '=', $id)->get();
        $views = View::where('post_id', '=', $id)->get();
        $comments = Comment::where('post_id', '=', $id)->get();

        $num_image = count( Image::where('post_id', '=', $id)->get());
        $num_like = count( Like::where('post_id', '=', $id)->get());
        $num_comment = count( Comment::where('post_id', '=', $id)->get());

        return view('site.slider', ['image' => $image,
                                    'comments' => $comments,
                                    'tags' => $tags,
                                    'views' => $views,
                                    'num_image' => $num_image,
                                    'num_like' => $num_like,
                                    'num_comment' => $num_comment]);

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

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
    public function edit(){

    }
}