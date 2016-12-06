<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Image;
use App\News;
use App\Comment;

use App\Tag;

use App\View;

use App\Like;
use App\Liked;
use App\User;
use App\Color;
use App\Style;
use App\Room;
use Input;
use Carbon\Carbon;

use Auth;
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
     public function index ($room = 0, $style = 0, $color = 0, $sort = 0)
     {
       if ($room != 0 ) {
           $roomArray = explode(',',$room);
           $roomSort = "";
           foreach ($roomArray as $roomArrayItem) {
               if ($roomArrayItem !== end($roomArray)) {
                   $roomSort .= ' rooms regexp ( '.$roomArrayItem.') and';
               }
               else {
                   $roomSort .= ' rooms regexp ( '.$roomArrayItem.')';
               }
           }
       }else{
           $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
       }
       if ($style != 0 ) {
           $styleArray = explode(',',$style);
           $styleSort = "";
           foreach ($styleArray as $styleArrayItem) {
               if ($styleArrayItem !== end($styleArray)) {
                   $styleSort .= ' style regexp ( '.$styleArrayItem.') and';
               }
               else {
                   $styleSort .= ' style regexp ( '.$styleArrayItem.')';
               }
           }
       }else{
           $styleSort = "style regexp '[a-zA-Z0-9_]'";
       }
       if ($color != 0 ) {
           $colorArray = explode(',',$color);
           $colorSort = "";
           foreach ($colorArray as $colorArrayItem) {
               if ($colorArrayItem !== end($colorArray)) {
                   $colorSort .= ' colors regexp ( '.$colorArrayItem.') and';
               }
               else {
                   $colorSort .= ' colors regexp ( '.$colorArrayItem.')';
               }
           }
       }else{
           $colorSort = "colors regexp '[a-zA-Z0-9_]'";
       }
       if ($sort != 0 ) {
         if ($sort == 'popular') {
             $sortSort = 'views_count';
         }elseif ($sort == 'recommended') {
             $sortSort = 'id';
         }elseif ($sort == 'new') {
             $sortSort = 'id';
         }else {
             $sortSort = '';
         }

       }else{
         $sortSort = true;
       }
       $colors = Color::all();
       $styles = Style::all();
       $rooms = Room::all();
       $news = News::orderBy('id','desc')->first();
       if ($sort != 0){
           $images = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                            ->where('verified', '=', true)
                            ->take(3)
                            ->orderBy($sortSort, 'desc')
                            ->get();
       }else {
           $images = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                            ->where('verified', '=', true)
                            ->take(3)
                            ->get();
           $sortSort = false;
       }
       return view('site.index', ['news' => $news,
                                  'colors' => $colors,
                                  'styles' => $styles,
                                  'rooms' =>  $rooms,
                                  'images' => $images,
                                  'roomSort' => $roomSort,
                                  'colorSort' => $colorSort,
                                  'styleSort' => $styleSort,
                                  'sortSort' => $sortSort,
                                  'room' => $room,
                                  'style' => $style,
                                  'color' => $color,
                                  'sort' => $sort]);

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
         $sortSort = $_POST['sortSort'];
         $roomSort = $_POST['roomSort'];
         $styleSort = $_POST['styleSort'];
         $colorSort = $_POST['colorSort'];

         if ($sortSort != 0) {
              $ajaxImage = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                               ->where('verified', '=', true)
                               ->skip($lastId)
                               ->take(3)
                               ->orderBy($sortSort, 'desc')
                               ->get();
         }else {
              $ajaxImage = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                               ->where('verified', '=', true)
                               ->skip($lastId)
                               ->take(3)
                               ->get();
         }

         return $ajaxImage;
     }
    /**
     * @param
     *
     * @return
     *
     */
    public function indexItem($id, $room = 0, $style = 0, $color = 0, $sort = 0){

         if ($room != 0 ) {
            $roomArray = explode(',',$room);
            $roomSort = "";
            foreach ($roomArray as $roomArrayItem) {
                if ($roomArrayItem !== end($roomArray)) {
                    $roomSort .= ' rooms regexp ( '.$roomArrayItem.') and';
                }
                else {
                    $roomSort .= ' rooms regexp ( '.$roomArrayItem.')';
                }
            }
        }else{
            $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
        }
        if ($style != 0 ) {
            $styleArray = explode(',',$style);
            $styleSort = "";
            foreach ($styleArray as $styleArrayItem) {
                if ($styleArrayItem !== end($styleArray)) {
                    $styleSort .= ' style regexp ( '.$styleArrayItem.') and';
                }
                else {
                    $styleSort .= ' style regexp ( '.$styleArrayItem.')';
                }
            }
        }else{
            $styleSort = "style regexp '[a-zA-Z0-9_]'";
        }
        if ($color != 0 ) {
            $colorArray = explode(',',$color);
            $colorSort = "";
            foreach ($colorArray as $colorArrayItem) {
                if ($colorArrayItem !== end($colorArray)) {
                    $colorSort .= ' colors regexp ( '.$colorArrayItem.') and';
                }
                else {
                    $colorSort .= ' colors regexp ( '.$colorArrayItem.')';
                }
            }
        }else{
            $colorSort = "colors regexp '[a-zA-Z0-9_]'";
        }
        if ($sort != 0 ) {
          if ($sort == 'popular') {
              $sortSort = 'views_count';
          }elseif ($sort == 'recommended') {
              $sortSort = 'id';
          }elseif ($sort == 'new') {
              $sortSort = 'id';
          }else {
              $sortSort = '';
          }

        }else{
          $sortSort = true;
        }

        if ($sort != 0){
            $images = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('id','>=', $id)
                           ->take(3)
                           ->orderBy($sortSort, 'desc')
                           ->get();
            $image = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                          ->where('id','=', $id)
                          ->first();
        }else {
            $images = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('id','>=', $id)
                           ->take(3)
                           ->get();
            $image = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                          ->where('id','=', $id)
                          ->first();

        }

        if (empty($image)) {

             $image = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('id','>', $id)
                           ->first();
             if (empty($image)) {
                  $image = Image::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                                ->where('id','<', $id)
                                ->first();
             }else{
                  $image = false;
             }
        }
        $needImage = Image::find($id);
        $user = User::find($needImage->author_id);
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();
        $tags = Tag::where('post_id', '=', $id)->get();
        $views = View::where('post_id', '=', $id)->get();
        $comments = Comment::where('post_id', '=', $id)->get();

        $num_image = count( Image::all());
        $num_like = count( Like::where('post_id', '=', $id)->get());

        $num_comment = count( Comment::where('post_id', '=', $id)->get());

        $likeThisUser = Like::where('user_id', '=', Auth::id() )
                            ->where('post_id', '=', $id)
                            ->get()
                            ->toArray();
        if (!empty($likeThisUser)) {
             $colorLike = true;
        }else {
             $colorLike = false;
        }
        $likedThisUser = Liked::where('user_id', '=', Auth::id() )
                              ->where('post_id', '=', $id)
                              ->get()
                              ->toArray();
        if (!empty($likedThisUser)) {
            $colorLiked = true;
        }else {
            $colorLiked = false;
        }
        $new_count = $image->views_count + 1;
        $image->views_count = $new_count;
        $image->save();

        $news = News::orderBy('id','desc')->first();
        
        return view('site.slider', ['news' => $news,
                                    'user' => $user,
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
                                    'num_comment' => $num_comment,
                                    'colorLike' => $colorLike,
                                    'colorLiked' => $colorLiked]);

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        $image = new Image();

        $lastId = Image::orderBy('id', 'desc')->first();
        $image->photo = $_FILES['photo'];
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->author_id = $_POST['author_id'];
        $image->user_upload_id = $_POST['user_upload_id'];
        $image->verified = false;
        $color = $_POST['color'];
        $colorRes = " ";
        if (is_array($color)) {
            foreach ($color as $colorItem) {
                $colorRes .=$colorItem.', ';
            }
            $image->colors = $colorRes;
        }else{
            $image->colors = $color;
        }

        $room = $_POST['room'];
        $roomRes = " ";
        if (is_array($room)) {
            foreach ($room as $roomItem) {
                $roomRes .=$roomItem.', ';
            }
            $image->rooms = $roomRes;
        }else{
            $image->rooms = $room;
        }

        $style = $_POST['style'];
        $styleRes = " ";
        if (is_array($style)) {
            foreach ($style as $styleItem) {
                $styleRes .=$styleItem.', ';
            }
            $image->style = $styleRes;
        }else{
            $image->style = $style;
        }

        $variantRes = " ";
            foreach (Input::file('files') as $variantItem) {
            $view = new View();
            $view->photo = $variantItem;
            $view->user_id = $_POST["author_id"];
            $view->user_id = $_POST["author_id"];
            $view->save();
            $addViewInfo = View::where('user_id', '=', $_POST['author_id'])
                                ->orderBy('id', 'desc')
                                ->first();
            $updateViewInfo = View::find($addViewInfo->id);
            $variantRes .= $addViewInfo->id.',';
            $updateViewInfo->path_min = $updateViewInfo->photo->url('small');
            $updateViewInfo->path_full = $updateViewInfo->photo->url();
            $updateViewInfo->post_id = $lastId->id + 1;
            $updateViewInfo->save();

        }

        $image->variants = $variantRes;
        $image->save();

        $tags = explode(';',$_POST['data-tags']);
        foreach ($tags as $tag) {
          $newTag = new Tag();
          $newTag->title = $tag;
          $newTag->post_id = $image->id;

          $newTag->save();

        }
        $addInfo = Image::where('author_id', '=', $_POST['author_id'])
                        ->orderBy('id', 'desc')
                        ->first();
        $updateIinfo = Image::find($addInfo->id);
        $updateIinfo->full_path = $updateIinfo->photo->url('max');
        $updateIinfo->min_path = $updateIinfo->photo->url('small');
        $updateIinfo->save();
        return redirect()->back();
    }
    public function addPhotoSite($id)
    {
        $image = Image::find($id);
        if ( !isset($_FILES['photo'])) {
            $image->photo = $_FILES['photo'];
        }
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->verified = true;
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
        $image->save();
        return redirect()->back();
    }

}
