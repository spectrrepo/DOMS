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
use App\User;
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
     public function index ($room = 'true', $style = 'true', $color = 'true')
     {

       $colors = Color::all();
       $styles = Style::all();
       $rooms = Room::all();
       $images = DB::select('select * from Images where true');

       return view('site.index', ['colors' => $colors,
                                  'styles' => $styles,
                                  'rooms' =>  $rooms,
                                  'images' => $images]);

    }
    public function loadLeftPhoto () {
        $lastPhoto = $_POST['lastPhoto'];
        $images = Image::skip($lastPhoto)->take(3)->get();
        return $images;
    }
    public function loadRightPhoto () {
        $lastPhoto = $_POST['lastPhoto'];
        $images = Image::skip($lastPhoto)->take(3)->get();
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
        $user = User::find($image->author_id);
        $images = Image::skip($image->id - 1)->take(3)->get();
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();

        $tags = Tag::where('post_id', '=', $id)->get();
        $views = View::where('post_id', '=', $id)->get();
        $comments = Comment::where('post_id', '=', $id)->get();

        $num_image = count( Image::all());
        $num_like = count( Like::where('post_id', '=', $id)->get());
        $num_comment = count( Comment::where('post_id', '=', $id)->get());

        $new_count = $image->views_count + 1;
        $image->views_count = $new_count;
        $image->save();
        return view('site.slider', ['user' => $user,
                                    'colors' => $colors,
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

        $image = new Image();

        $image->photo = $_FILES['photo'];
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->author_id = $_POST['author_id'];
        $image->user_upload_id = $_POST['user_upload_id'];

        $image->colors = $_POST['color'];
        $image->rooms = $_POST['room'];
        $image->style = $_POST['style'];
        $image->variants = 'djskf';
        $image->save();

        $addInfo = Image::where('author_id', '=', $_POST['author_id'])
                        ->orderBy('update_to', 'desc')
                        ->first();
        $updateIinfo = Image::find($addInfo->id);
        $updateIinfo->full_path = $updateIinfo->photo->url('max');
        $updateIinfo->min_path = $updateIinfo->photo->url('small');
    }

}
