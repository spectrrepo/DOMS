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
use Carbon\Carbon;

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
     public function index ($room = 0, $style = 0, $color = 0, $sort = "")
     {
       if ($room != 0 ) {
           $roomSort = 'rooms = '.$room;
       }else{
           $roomSort = true;
       }
       if ($style != 0 ) {
           $styleSort = 'style = '.$style;
       }else{
           $styleSort = true;
       }
       if ($color != 0 ) {
           $colorSort = 'colors = '.$color;
       }else{
           $colorSort = true;
       }
       if ($sort != "" ) {
         if ($sort == 'popular') {
             $sortSort = 'order by views_count desc';
         }elseif ($sort == 'recommended') {
             $sortSort = 'order by id desc';
         }elseif ($sort == 'new') {
             $sortSort = 'order by id desc';
         }else {
             $sortSort = 'and 1';
         }

       }else{
         $sortSort = true;
       }
       $colors = Color::all();
       $styles = Style::all();
       $rooms = Room::all();
       if ($sort != ""){
           $images = DB::select('select * from Images where '.$roomSort.' and '.$styleSort.' and '.$colorSort.' '.$sortSort);
       }else {
           $images = DB::select('select * from Images where '.$roomSort.' and '.$styleSort.' and '.$colorSort);
       }
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
        $idy = $image->author_id;
        $user = User::find($idy);
        $images = Image::skip($image->id - 1)->take(3)->get();
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();

        $tags = Tag::where('post_id', '=', $id)->get();
        $views = View::where('post_id', '=', $id)->get();
        $comments = Comment::where('post_id', '=', $id)->get();

        $num_image = count( Image::all());
        $num_like = count( Like::where('post_id', '=', $id)->get());
        $num_comment = count(                 $table->string('file_path_min')->nullable();
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
        $image->verified = false;
        $color = $_POST['color'];
        $colorRes = "";
        if (is_array($color)) {
            foreach ($color as $colorItem) {
                $colorRes .=$colorItem.', ';
            }
            $image->colors = $colorRes;
        }else{
            $image->colors = $color;
        }

        $room = $_POST['room'];
        $roomRes = "";
        if (is_array($room)) {
            foreach ($room as $roomItem) {
                $roomRes .=$roomItem.', ';
            }
            $image->rooms = $roomRes;
        }else{
            $image->rooms = $room;
        }

        $style = $_POST['style'];
        $styleRes = "";
        if (is_array($style)) {
            foreach ($style as $styleItem) {
                $styleRes .=$styleItem.', ';
            }
            $image->style = $styleRes;
        }else{
            $image->style = $style;
        }

        // $variant = $_FILES["files"];
        $variantRes = "";
        foreach (Input::file('files') as $variantItem) {
            $view = new View();
            $view->photo = $variantItem;
            $view->user_id = $_POST["author_id"];
            $view->save();
            $addViewInfo = View::where('user_id', '=', $_POST['author_id'])
                                ->orderBy('id', 'desc')
                                ->first();
            $updateViewInfo = View::find($addViewInfo->id);
            $variantRes .= $addViewInfo->id.',';
            $updateViewInfo->path_min = $updateViewInfo->photo->url('small');
            $updateViewInfo->path_full = $updateViewInfo->photo->url();
            $updateViewInfo->save();

        }
        $image->variants = $variantRes;
        $image->save();

        $addInfo = Image::where('author_id', '=', $_POST['author_id'])
                        ->orderBy('id', 'desc')
                        ->first();
        $updateIinfo = Image::find($addInfo->id);
        $updateIinfo->full_path = $updateIinfo->photo->url('max');
        $updateIinfo->min_path = $updateIinfo->photo->url('small');
        $updateIinfo->save();
        return redirect()->back();
    }


}
