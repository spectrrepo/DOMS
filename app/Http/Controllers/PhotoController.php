<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Image;

use App\Comment;

use App\Tag;

use App\View;

use App\Like;

use App\Color;
use App\Style;
use App\Room;

use Input;
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
     public function index ($filter = false)
     {

       $colors = Color::all();
       $styles = Style::all();
       $rooms = Room::all();
       $images = Image::skip(0)->take(28)->get();

       return view('site.index', ['colors' => $colors,
                                  'styles' => $styles,
                                  'rooms' =>  $rooms,
                                  'images' => $images]);

    }
    public function loadSomePhoto ($lastPhoto) {
        $images = Image::skip($lastPhoto)->take(4)->get();
        return $images;
    }
    /**
     * @param
     *
     * @return
     *
     */
     public function indexAddPage(){
         $lastId = $_POST['lastId'];
         $ajaxImage = Image::skip($lastId)->take(28)->get();
         return $ajaxImage;
     }
    /**
     * @param
     *
     * @return
     *
     */
    public function indexItem($id){
        $image = Image::find($id);
        // $image.id = $image.id;
        $images = Image::skip($image->id - 1)->take(8)->get();
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();

        $tags = Tag::where('post_id', '=', $id)->get();
        $views = View::where('post_id', '=', $id)->get();
        $comments = Comment::where('post_id', '=', $id)->get();

        $num_image = count( Image::all());
        $num_like = count( Like::where('post_id', '=', $id)->get());
        $num_comment = count( Comment::where('post_id', '=', $id)->get());

        return view('site.slider', ['colors' => $colors,
                                    'styles' => $styles,
                                    'rooms' =>  $rooms,
                                    'images' => $images,
                                    'image' => $image,
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
        $image = Image::create(Input::all());
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function sort( $rooms = "", $styles="", $colors = "", $sort = ""){
        switch (variable) {
            case 'value':
                # code...
                break;

            default:
                # code...
                break;
        }
    }
}
