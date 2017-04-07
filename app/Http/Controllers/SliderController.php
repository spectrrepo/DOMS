<?php
// checked, but questions
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use Illuminate\Support\Facades\DB;

use App\Comment;
use Auth;

use App\Like;
use App\Liked;

use App\User;
use App\View;

// TODO: fix method dwnld photo slider 

class SliderController extends Controller
{
    public function dwnldPhotoSlider()
    {
        $room = $_POST['roomSort'];
        $style = $_POST['styleSort'];
        $color = $_POST['colorSort'];
        $sort = $_POST['sortSort'];
        $tag = $_POST['tag'];
        $direction = $_POST['direction'];
        $id = $_POST['id'];
        $id_pos = $_POST['currentPosition'];
        if ($room != '0' ) {
             $roomSort = ' rooms like "% '.$room.',%"';
             $roomSorting = $room;
         }else{
             $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
             $roomSorting = 0;
         }
         if ($style != '0' ) {
             $styleSort = ' style like "% '.$style.',%"';
             $styleSorting = $style;
         }else{
             $styleSort = "style regexp '[a-zA-Z0-9_]'";
             $styleSorting = 0;
         }
         if ($color != '0' ) {
             $colorSort = ' colors like "% '.$color.',%"';
             $colorSorting = $color;
         }else{
             $colorSort = "colors regexp '[a-zA-Z0-9_]'";
             $colorSorting = 0;
         }
           if ($sort != '0' ) {
             if ($sort == 'popular') {
                 $sortSort = 'views_count';
             }elseif ($sort == 'recommended') {
                 $sortSort = 'id';
             }elseif ($sort == 'new') {
                 $sortSort = 'id';
             }else {
                 $sortSort = '';
             }
             $sortSorting = $sort;

           }else{
             $sortSort = true;
             $sortSorting = 0;

           }

           if ( $tag != '0') {
              $tagSort = 'and tags like "%#'.$tag.';%" ';
           } else {
              $tagSort = '';
           }
      if ($sort != "0"){
          if ($direction == 'left') {

              $newPhoto = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true and id < '.$id)
              ->take(3)
              ->orderBy($sortSort, 'desc')
              ->get();
              if (empty($newPhoto->toArray())) {
                  $newPhoto = 'error_download';
              }
          }else {
              $newPhoto = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true ')
              ->where('id', '>', $id)
              ->take(3)
              ->orderBy($sortSort, 'desc')
              ->get();
              if (empty($newPhoto->toArray())) {
                  $newPhoto = 'error_download';
              }
          }
      }else {
          if ($direction == 'left') {
              $newPhoto = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true and id < '.$id)
              ->take(3)
              ->get();
              $sortSort = false;
              if (empty($newPhoto->toArray())) {
                  $newPhoto = 'error_download';
              }
          }else {
              $newPhoto = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
              ->where('id', '>', $id+1)
              ->take(3)
              ->get();
              $sortSort = false;
              if (empty($newPhoto->toArray())) {
                  $newPhoto = 'error_download';
              }
          }
      }
      return $newPhoto;
    }

    public function dwnldViewsForPhoto()
    {
      $id = $_POST['id'];
      $views = View::select('id', 'path_full', 'path_min')
                    ->where('post_id', '=', $id)
                    ->get();

      return $views;
    }

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

    public function dwnldInfoPhoto()
    {

      $id = $_POST['id'];
      $photoInfo = Picture::select('id',
                                   'views_count',
                                   'comments_count',
                                   'full_path',
                                   'likes_count',
                                   'description',
                                   'title')
                           ->where('id', '=', $id)
                           ->get();

      return $photoInfo;

    }

    public function dwnldLikeWhom()
    {

      $id = $_POST['id'];
      $likes = Like::where('post_id', '=', $id)->get();

      $likeWhom = array();
      foreach ($likes as $like) {
          $user = User::select('id', 'name', 'quadro_ava')
                       ->where('id', '=', $like->user_id)
                       ->get();
          array_push( $likeWhom, $user);
      }

      return $likeWhom;
    }

    public function dwnldPhotoUser()
    {

      $id = $_POST['id'];
      $pic = Picture::find($id);
      $user = User::select('id', 'quadro_ava', 'name')
                   ->where('id', '=', $pic->author_id)
                   ->get();

      return $user;
    }

    public function dwnldTags()
    {

      $id = $_POST['id'];
      $image = Picture::find($id);
      $tagsString = $image->tags;
      $tags = explode(';',$tagsString);

      return $tags;
    }

    public function loadActiveLike()
    {
        $id = $_POST['id'];
        if (Auth::check()) {
            $findLike = Like::where('post_id', '=', $id)
                            ->andWhere('user_id', '=', Auth::user()->id);
            if ( $findLike->count() !== 0 ) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        }else {
            $response = 'error';
        }

        return $response;
    }

    public function loadActiveLiked()
    {
        $id = $_POST['id'];
        if (Auth::check()) {
            $findLiked = Liked::where('post_id', '=', $id)
                             ->where('user_id', '=', Auth::user()->id);
            if ( $findLiked->count() !== 0 ) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        }else {
            $response = 'error';
        }

        return $response;
    }

    public function loadAllLikes ()
    {
        $id = $_POST['id'];
        $allLikes = Like::where('post_id', '=', $id)->get();

        $likeWhom = array();
        foreach ($allLikes as $like) {
            $user = User::find($like->user_id);
            array_push( $likeWhom, $user);
        }

        return $likeWhom;
    }
}
