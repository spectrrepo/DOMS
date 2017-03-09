<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Picture;
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

use Image;
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
     private function sortCommon($table, $tableCell, $itemSort){
        if ($itemSort != 0) {
             $arrayItemSort = explode(',',$itemSort);
             $sortExpression = ' AND ';
             foreach ( $arrayItemSort as $item){
                  if (end($arrayItemSort) == current($arrayItemSort)) {
                       $sortExpression .= $tableCell.'='.$item.' ';
                  }else {
                       $sortExpression .= $tableCell.'='.$item.' AND ';
                  }
             }
             $sortCondition = ' JOIN   '.$table.'
                                ON Images.id = '.$tableCell.' ';
         } else {
             $sortExpression = '';
             $sortCondition = '';
         }
         $result = array('Expression' => $sortExpression,
                         'Condition' => $sortCondition);
         return $result;
     }

     private function sortSort ( $sort ) {
          if ($sort != 0) {
            if ($sort == 'popular') {
                 $sortSort = ' ORDER BY Images.views_count DESC ';
            } elseif ($sort == 'recommended') {
                 $sortSort = ' ORDER BY Images.id DESC ';
            } elseif ($sort == 'new') {
                 $sortSort = ' ORDER BY Images.id DESC ';
            } else {
                 $sortSort = ' ';
            }
            $sortSorting = $sort;
         } else {
            $sortSort = ' ';
            $sortSorting = 0;
         }
         $result = array('Expression' => $sortSort,
                         'Condition' => $sortSorting);
         return $result;
     }

     private function tagSort ($tag) {
          if ($tag != '0') {
             $tagSort = ' AND Tags.title="'.$tag.'" ';
             $tagCondition = ' JOIN   Tags ON Images.id = Tags.post_id ';
         } else {
             $tagSort = '';
             $tagCondition = ' ';
         }
         $result = array('Expression' => $tagSort,
                         'Condition' => $tagCondition);
         return $result;
     }
     private function activeColor($what, $id)
     {
          if ( $what == 'liked') {
               $activeThisUser = Liked::where('user_id', '=', Auth::id())
                                     ->where('post_id', '=', $id)
                                     ->get()
                                     ->toArray();
          } else {
               $activeThisUser = Like::where('user_id', '=', Auth::id())
                                   ->where('post_id', '=', $id)
                                   ->get()
                                   ->toArray();

          }

          if (!empty($activeThisUser)) {
              $colorActive = true;
          } else {
              $colorActive = false;
          }
          return $colorActive;

     }
     private function addJoinData () {
          if (Input::has('color')) {
              $color = $_POST['color'];
              if (is_array($color)) {
                  foreach ($color as $colorItem) {
                     DB::table('img_colors')
                          ->insert(
                             ['img_id' => $lastId,
                             'color_id' => $colorItem]
                            );
                  }
              } else {
                  DB::table('img_colors')
                     ->insert(
                        ['img_id' => $lastId,
                        'color_id' => $color]
                       );
              }
          }
     }

     public function index($room = 0, $style = 0, $color = 0, $sort = 0, $tag = 0)
     {

         $roomsArray = $this->sortCommon('img_rooms', 'img_rooms.room_id', $room);
         $colorsArray = $this->sortCommon('img_colors', 'img_colors.color_id', $color);
         $stylesArray = $this->sortCommon('img_styles', 'img_styles.style_id', $style);
         $sortArray = $this->sortSort($sort);
         $tagArray = $this->tagSort($tag);

         $colors = Color::all();
         $styles = Style::all();
         $rooms = Room::all();
         $news = News::orderBy('id', 'desc')->first();

         $images = DB::select(
                      "SELECT Images.id AS id ,
                              Images.full_path AS photo
                       FROM   Images
                       ".$colorsArray['Condition']."
                       ".$roomsArray['Condition']."
                       ".$stylesArray['Condition']."
                       ".$tagArray['Condition']."
                       ".$colorsArray['Expression']."
                       ".$roomsArray['Expression']."
                       ".$stylesArray['Expression']."
                       ".$tagArray['Expression']."
                       WHERE Images.verified=true
                       GROUP BY Images.id
                       ".$sortArray['Expression'].";");

         return view('site.index', ['news' => $news,
                                    'colors' => $colors,
                                    'styles' => $styles,
                                    'rooms' =>  $rooms,
                                    'images' => $images,
                                    'tag' => $tag,
                                    'room' => $room,
                                    'style' => $style,
                                    'color' => $color,
                                    'sort' => $sort]);
     }

    /**
     * @param
     *
     * @return
     *
     */
     public function indexAddPage()
     {
         $lastId = $_POST['lastId'];
         $sort = $_POST['sortSorting'];
         $room = $_POST['roomSorting'];
         $style = $_POST['styleSorting'];
         $color = $_POST['colorSorting'];
         $tag = $_POST['tag'];

         if ($room != 0) {
             $roomSort = ' rooms like "% '.$room.',%"';
         } else {
             $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
         }
         if ($style != 0) {
             $styleSort = ' style like "% '.$style.',%"';
         } else {
             $styleSort = "style regexp '[a-zA-Z0-9_]'";
         }
         if ($color != 0) {
             $colorSort = ' colors like "% '.$color.',%"';
         } else {
             $colorSort = "colors regexp '[a-zA-Z0-9_]'";
         }
         if ($sort != 0) {
             if ($sort == 'popular') {
                 $sortSort = 'views_count';
             } elseif ($sort == 'recommended') {
                 $sortSort = 'id';
             } elseif ($sort == 'new') {
                 $sortSort = 'id';
             } else {
                 $sortSort = '';
             }
         } else {
             $sortSort = true;
         }

         if ($tag != '0') {
             $tagSort = 'and tags like "%#'.$tag.';%" ';
         } else {
             $tagSort = '';
         }


         return $ajaxImage;
     }

    public function loadSortPhoto()
    {
        $sort = $_POST['sortSort'];
        $room = $_POST['roomSort'];
        $style = $_POST['styleSort'];
        $color = $_POST['colorSort'];
        $tag = $_POST['tag'];
        if ($room != 0) {
            $roomSort = ' rooms like "% '.$room.',%"';
        } else {
            $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
        }
        if ($style != 0) {
            $styleSort = ' style like "% '.$style.',%"';
        } else {
            $styleSort = "style regexp '[a-zA-Z0-9_]'";
        }
        if ($color != 0) {
            $colorSort = ' colors like "% '.$color.',%"';
        } else {
            $colorSort = "colors regexp '[a-zA-Z0-9_]'";
        }
        if ($sort != '0') {
            if ($sort == 'popular') {
                $sortSort = 'views_count';
            } elseif ($sort == 'recommended') {
                $sortSort = 'id';
            } elseif ($sort == 'new') {
                $sortSort = 'id';
            } else {
                $sortSort = '';
            }
        } else {
            $sortSort = true;
        }
        if ($tag != '0') {
            $tagSort = 'and tags like "%#'.$tag.';%" ';
        } else {
            $tagSort = '';
        }
        if ($sort != '0') {
            $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                  ->take(3)
                                  ->orderBy($sortSort, 'desc')
                                  ->get();
            if (empty($ajaxImage->toArray())) {
                $ajaxImage = 'error_download';
            }
        } else {
            $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                  ->take(3)
                                  ->get();
            if (empty($ajaxImage->toArray())) {
                $ajaxImage = 'error_download';
            }
        }
        return $ajaxImage;
    }
     /**
      * Slider photo sort download
      * @param
      *
      * @return
      *
      */
     public function loadSortPhotoSlider()
     {
         $sort = $_POST['sortSort'];
         $room = $_POST['roomSort'];
         $style = $_POST['styleSort'];
         $color = $_POST['colorSort'];
         $tag = $_POST['tag'];
         $id = $_POST['id'];
         if ($room != 0) {
             $roomSort = ' rooms like "% '.$room.',%"';
         } else {
             $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
         }
         if ($style != 0) {
             $styleSort = ' style like "% '.$style.',%"';
         } else {
             $styleSort = "style regexp '[a-zA-Z0-9_]'";
         }
         if ($color != 0) {
             $colorSort = ' colors like "% '.$color.',%"';
         } else {
             $colorSort = "colors regexp '[a-zA-Z0-9_]'";
         }
         if ($sort != '0') {
             if ($sort == 'popular') {
                 $sortSort = 'views_count';
             } elseif ($sort == 'recommended') {
                 $sortSort = 'id';
             } elseif ($sort == 'new') {
                 $sortSort = 'id';
             } else {
                 $sortSort = '';
             }
         } else {
             $sortSort = true;
         }
         if ($tag != '0') {
             $tagSort = 'and tags like "%#'.$tag.';%" ';
         } else {
             $tagSort = '';
         }
         if ($sort != 0) {
             $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                  ->take(3)
                                  ->orderBy($sortSort, 'desc')
                                  ->get();
             if (empty($ajaxImage->toArray())) {
                 $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                                    ->where('id', '>', $id)
                                                    ->get();
                 if (empty($ajaxImage->toArray())) {
                     $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                       ->where('id', '<', $id)
                                       ->get();
                 } else {
                     $ajaxImage = 'error_download';
                 }
             }
         } else {
             $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                  ->take(3)
                                  ->get();
             if (empty($ajaxImage->toArray())) {
                 $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                    ->where('id', '>', $id)
                                    ->get();

                 if (empty($ajaxImage->toArray())) {
                     $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                       ->where('id', '<', $id)
                                       ->get();
                 } else {
                     $ajaxImage = 'error_download';
                 }
             }
         }
         return $ajaxImage;
     }
    /**
     * @param
     *
     * @return
     *
     */
    public function indexItem($id, $room = 0, $style = 0, $color = 0, $sort = 0, $tag = 0)
    {
        $roomsArray = $this->sortCommon('img_rooms', 'img_rooms.room_id', $room);
        $colorsArray = $this->sortCommon('img_colors', 'img_colors.color_id', $color);
        $stylesArray = $this->sortCommon('img_styles', 'img_styles.style_id', $style);
        $sortArray = $this->sortSort($sort);
        $tagArray = $this->tagSort($tag);

        $images = DB::select(
                             "SELECT Images.id AS id ,
                                     Images.author_id AS author_id,
                                     Images.full_path AS photo,
                                     Images.views_count AS views,
                                     Images.title AS title,
                                     Images.description AS description
                              FROM   Images
                              ".$colorsArray['Condition']."
                              ".$roomsArray['Condition']."
                              ".$stylesArray['Condition']."
                              ".$tagArray['Condition']."
                              ".$colorsArray['Expression']."
                              ".$roomsArray['Expression']."
                              ".$stylesArray['Expression']."
                              ".$tagArray['Expression']."
                              WHERE Images.verified=true
                              AND Images.id>=".$id."
                              GROUP BY Images.id
                              ".$sortArray['Expression'].";");
        $num_image = count($images);
        $imageCurrent = DB::select(
                             "SELECT Images.id AS id ,
                                     Images.author_id AS author_id,
                                     Images.full_path AS photo,
                                     Images.views_count AS views,
                                     Images.title AS title,
                                     Images.description AS description
                              FROM   Images
                              ".$colorsArray['Condition']."
                              ".$roomsArray['Condition']."
                              ".$stylesArray['Condition']."
                              ".$tagArray['Condition']."
                              ".$colorsArray['Expression']."
                              ".$roomsArray['Expression']."
                              ".$stylesArray['Expression']."
                              ".$tagArray['Expression']."
                              WHERE Images.verified=true
                              AND Images.id=".$id."
                              GROUP BY Images.id
                              ".$sortArray['Expression'].";");
        if (empty($imageCurrent)) {
            $imageCurrent = Picture::whereRaw($roomsArray['Condition'].' and '
                                      .$stylesArray['Condition'].' and '
                                      .$colorsArray['Condition'])
                            ->where('id', '>', $id)
                            ->first();

            if (empty($image)) {
                $imageCurrent = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                                ->where('id', '<', $id)
                                ->first();
            } else {
                $imageCurrent = false;
            }
        }

        $likes = Like::where('post_id', '=', $id)->get();
        $num_like = $likes->count();
        $likeWhom = array();
        foreach ($likes as $like) {
            $user = User::select('id as user_id', 'quadro_ava as portret', 'name')
                         ->where('id', '=', $like->user_id)
                         ->get()->toArray();
            array_push($likeWhom, $user);
        }
        $user = User::find($imageCurrent[0]->author_id);
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();
        $news = News::orderBy('id', 'desc')->first();

        $tags = Tag::where('post_id', '=', $id)->where('title', '<>', '')->get();
        $views = View::where('post_id', '=', $id)->get();

        $comments = DB::select('SELECT Comments.id,
                                       Users.id AS user_id,
                                       Images.id AS image_id,
                                       Users.name AS user_name,
                                       Users.quadro_ava AS user_quadro_ava,
                                       Comments.text_comment AS text_comment,
                                       Comments.rus_date AS rus_date
                                FROM   Comments JOIN Users
                                ON     Comments.user_id=Users.id
                                JOIN   Images ON Images.id = Comments.post_id
                                WHERE  Images.id='.$id.
                               ' AND  Comments.status="read"');

        $num_comment = count($comments);
        $colorLike = $this->activeColor('like', $id);
        $colorLiked = $this->activeColor('liked', $id);

     //    $new_count = $image->views_count + 1;
     //    $imageCurrent->views_count = $new_count;
     //    $imageCurrent->save();
        return view('site.slider', ['news' => $news,
                                    'user' => $user,
                                    'colors' => $colors,
                                    'styles' => $styles,
                                    'rooms' =>  $rooms,
                                    'images' => $images,
                                    'image' => $imageCurrent[0],
                                    'comments' => $comments,
                                    'tags' => $tags,
                                    'views' => $views,
                                    'num_image' => $num_image,
                                    'num_like' => $num_like,
                                    'num_comment' => $num_comment,
                                    'colorLike' => $colorLike,
                                    'colorLiked' => $colorLiked,
                                    'likeWhom' => $likeWhom]);
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add()
    {
        $image = new Picture();

        $img = Image::make($_FILES['photo']['tmp_name']);

        $watermark = Image::make(public_path('/img/watermark-files/poloska.png'));
        $watermarkHouse = Image::make(public_path('/img/watermark-files/dom.png'));
        $img->insert($watermark, 'top', 0, 0);
        $img->insert($watermarkHouse, 'bottom-right', 30, 30);
        $img->save(public_path('/img/f.jpg'));
        $image->photo = public_path('/img/f.jpg');
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->author_id = $_POST['author_id'];
        $image->user_upload_id = $_POST['user_upload_id'];
        $image->verified = false;
        $lastId = Picture::orderBy('id', 'desc')->first()->id + 1;

        $this->addJoinData('color', 'img_colors', 'img_id',  'color_id');
        $this->addJoinData('room', 'img_rooms', 'img_id',  'room_id');
        $this->addJoinData('style', 'img_styles', 'img_id',  'style_id');

        $tags = explode(';', $_POST['data-tags']);
        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->title = $tag;
            $newTag->post_id = $lastId;
            $newTag->save();
        }

        if (!empty($_FILES['files']['tmp_name'])) {
            foreach ($_FILES['files']['tmp_name'] as $variantItem) {
                $view = new View();
                $imgView = Image::make($variantItem);
                $watermarkView = Image::make(public_path('/img/watermark-files/poloska.png'));
                $watermarkHouseView = Image::make(public_path('/img/watermark-files/dom.png'));

                $imgView->insert($watermarkView, 'top', 0, 0);
                $imgView->insert($watermarkHouseView, 'bottom-right', 30, 30);
                $imgView->save(public_path('/img/fv.jpg'));

                $view->photo = public_path('/img/fv.jpg');
                $view->user_id = $_POST["author_id"];
                $view->user_id = $_POST["author_id"];
                $view->save();

                $addViewInfo = View::where('user_id', '=', $_POST['author_id'])
                                    ->orderBy('id', 'desc')
                                    ->first();
                $updateViewInfo = View::find($addViewInfo->id);
                $updateViewInfo->path_min = $updateViewInfo->photo->url('small');
                $updateViewInfo->path_full = $updateViewInfo->photo->url();
                $updateViewInfo->post_id = $lastId;
                $updateViewInfo->save();
            }
        }

        $image->save();
        $addInfo = Picture::where('author_id', '=', $_POST['author_id'])
                          ->orderBy('id', 'desc')
                          ->first();
        $updateIinfo = Picture::find($addInfo->id);
        $img2 = Image::make($_FILES['photo']['tmp_name']);
        $img2->encode('jpg');
        $img2->fit(400);
        $img2->save(public_path('/img/quadro/'.$addInfo->id.'.jpg'));
        $updateIinfo->quadro_photo = '/img/quadro/'.$addInfo->id.'.jpg';
        $updateIinfo->full_path = $updateIinfo->photo->url('max');
        $updateIinfo->min_path = $updateIinfo->photo->url('small');
        $updateIinfo->save();

        return redirect('/profile/'.Auth::user()->id)->with('check', 'true');
    }


    public function addPhotoSite($id)
    {
        $image = Picture::find($id);
        if (!isset($_FILES['photo'])) {
            $image->photo = $_FILES['photo'];
        }
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->verified = true;
        if (Input::has('style')) {
            $color = $_POST['color'];
            $colorRes = "";

            if (is_array($color)) {
                foreach ($color as $colorItem) {
                    $colorRes .=$colorItem.', ';
                }
                $image->colors = $colorRes;
            } else {
                $image->colors = $color;
            }
        }
        if (Input::has('style')) {
            $room = $_POST['room'];
            $roomRes = "";
            if (is_array($room)) {
                foreach ($room as $roomItem) {
                    $roomRes .=$roomItem.', ';
                }
                $image->rooms = $roomRes;
            } else {
                $image->rooms = $room;
            }
        }
        if (Input::has('style')) {
            $style = $_POST['style'];
            $styleRes = "";
            if (is_array($style)) {
                foreach ($style as $styleItem) {
                    $styleRes .=$styleItem.', ';
                }
                $image->style = $styleRes;
            } else {
                $image->style = $style;
            }
        }
        $variantRes = " ";
        if (!empty($_FILES['files']['tmp_name'])) {
            foreach ($_FILES['files']['tmp_name'] as $variantItem) {
                $view = new View();
                $imgView = Image::make($variantItem);
                $watermarkView = Image::make(public_path('/img/watermark-files/poloska.png'));
                $watermarkHouseView = Image::make(public_path('/img/watermark-files/dom.png'));
                $imgView->insert($watermarkView, 'top', 0, 0);
                $imgView->insert($watermarkHouseView, 'bottom-right', 30, 30);
                $imgView->save(public_path('/img/fv.jpg'));

                $view->photo = public_path('/img/fv.jpg');
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
                $updateViewInfo->post_id = $id;
                $updateViewInfo->save();
            }
        }
        $image->save();
        if (Auth::user()->status == 'moderator') {
            return redirect()->back();
        } else {
            return redirect('/profile/'.Auth::id())->with('check', 'true');
        }
    }

    public function allPhotoSite()
    {
        $images = DB::table('Images')->paginate(10);

        return view('moderator.all_photo_site', ['images' => $images]);
    }
}
