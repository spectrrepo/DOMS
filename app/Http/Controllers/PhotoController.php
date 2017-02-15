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
     public function index($room = 0, $style = 0, $color = 0, $sort = 0, $tag = 0)
     {
         if ($room != 0) {
             $roomSort = ' rooms like "% '.$room.',%"';
             $roomSorting = $room;
         } else {
             $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
             $roomSorting = 0;
         }
         if ($style != 0) {
             $styleSort = ' style like "% '.$style.',%"';
             $styleSorting = $style;
         } else {
             $styleSort = "style regexp '[a-zA-Z0-9_]'";
             $styleSorting = 0;
         }
         if ($color != 0) {
             $colorSort = ' colors like "% '.$color.',%"';
             $colorSorting = $color;
         } else {
             $colorSort = "colors regexp '[a-zA-Z0-9_]'";
             $colorSorting = 0;
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
             $sortSorting = $sort;
         } else {
             $sortSort = true;
             $sortSorting = 0;
         }

         if ($tag != '0') {
             $tagSort = 'and tags like "%#'.$tag.';%" ';
         } else {
             $tagSort = '';
         }
         
         $tagSorting = $tag;
         $colors = Color::all();
         $styles = Style::all();
         $rooms = Room::all();
         $news = News::orderBy('id', 'desc')->first();
         if ($sort != 0) {
             $images = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                            ->take(3)
                            ->orderBy($sortSort, 'desc')
                            ->get();
             if (empty($images->toArray())) {
                 $ajaxImage = 'error_download';
             }
         } else {
             $images = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                            ->take(3)
                            ->get();
             $sortSort = false;
             if (empty($images->toArray())) {
                 $ajaxImage = 'error_download';
             }
         }
         return view('site.index', ['news' => $news,
                                  'colors' => $colors,
                                  'styles' => $styles,
                                  'rooms' =>  $rooms,
                                  'images' => $images,
                                  'roomSorting' => $roomSorting,
                                  'colorSorting' => $colorSorting,
                                  'styleSorting' => $styleSorting,
                                  'sortSorting' => $sortSorting,
                                  'tagSorting' => $tagSorting,
                                  'room' => $room,
                                  'style' => $style,
                                  'color' => $color,
                                  'sort' => $sort,
                                  'tag' => $tag]);
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

         if ($sortSort != 0) {
             $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                    ->skip($lastId)
                                    ->take(3)
                                    ->get();
         } else {
             $ajaxImage = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                                    ->skip($lastId)
                                    ->take(3)
                                    ->orderBy($sortSort, 'desc')
                                    ->get();
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
        if ($room != 0) {
            $roomSort = ' rooms like "% '.$room.',%"';
            $roomSorting = $room;
        } else {
            $roomSort = "rooms regexp '[a-zA-Z0-9_]'";
            $roomSorting = 0;
        }
        if ($style != 0) {
            $styleSort = ' style like "% '.$style.',%"';
            $styleSorting = $style;
        } else {
            $styleSort = "style regexp '[a-zA-Z0-9_]'";
            $styleSorting = 0;
        }
        if ($color != 0) {
            $colorSort = ' colors like "% '.$color.',%"';
            $colorSorting = $color;
        } else {
            $colorSort = "colors regexp '[a-zA-Z0-9_]'";
            $colorSorting = 0;
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
            $sortSorting = $sort;
        } else {
            $sortSort = true;
            $sortSorting = 0;
        }

        if ($tag != '0') {
            $tagSort = 'and tags like "%#'.$tag.';%" ';
        } else {
            $tagSort = '';
        }
        $tagSorting = $tag;

        if ($sort != '0') {
            $images = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('verified', '=', true)
                           ->where('id', '>=', $id)
                           ->take(3)
                           ->orderBy($sortSort, 'desc')
                           ->get();
            $imageAll = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('verified', '=', true)
                           ->orderBy($sortSort, 'desc')
                           ->get();
            $image = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                          ->where('verified', '=', true)
                          ->where('id', '=', $id)
                          ->first();
        } else {
            $images = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('verified', '=', true)
                           ->where('id', '>=', $id)
                           ->take(3)
                           ->get();
            $imageAll = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                                          ->where('verified', '=', true)
                                          ->get();
            $image = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                          ->where('verified', '=', true)
                          ->where('id', '=', $id)
                          ->first();
        }

        if (empty($image)) {
            $image = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                           ->where('id', '>', $id)
                           ->first();
            if (empty($image)) {
                $image = Picture::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                                ->where('id', '<', $id)
                                ->first();
            } else {
                $image = false;
            }
        }
        $likes = Like::where('post_id', '=', $id)->get();

        $likeWhom = array();
        foreach ($likes as $like) {
            $user = User::find($like->user_id);
            array_push($likeWhom, $user);
        }

        $needImage = Picture::find($id);
        $user = User::find($needImage->author_id);
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();
        $tags = Tag::where('post_id', '=', $id)
                    ->where('title', '<>', '')
                    ->get();
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
        $allComments = Comment::join('Users', 'Users.id', '=', 'Comments.user_id')->get();


        $num_image = count(Picture::all());
        $num_like = count(Like::where('post_id', '=', $id)->get());

        $num_comment = count(Comment::where('post_id', '=', $id)->get());

        $likeThisUser = Like::where('user_id', '=', Auth::id())
                            ->where('post_id', '=', $id)
                            ->get()
                            ->toArray();
        if (!empty($likeThisUser)) {
            $colorLike = true;
        } else {
            $colorLike = false;
        }
        $likedThisUser = Liked::where('user_id', '=', Auth::id())
                              ->where('post_id', '=', $id)
                              ->get()
                              ->toArray();
        if (!empty($likedThisUser)) {
            $colorLiked = true;
        } else {
            $colorLiked = false;
        }
        $new_count = $image->views_count + 1;
        $image->views_count = $new_count;
        $image->save();

        $news = News::orderBy('id', 'desc')->first();

        return view('site.slider', ['imageAll' => $imageAll,
                                    'news' => $news,
                                    'allComments' => $allComments,
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
                                    'colorLiked' => $colorLiked,
                                    'sortSorting' => $sortSorting,
                                    'tagSorting' => $tagSorting,
                                    'colorSorting' => $colorSorting,
                                    'roomSorting' => $roomSorting,
                                    'likeWhom' => $likeWhom,
                                    'styleSorting' => $styleSorting]);
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
        if (Input::has('room')) {
            $room = $_POST['room'];
            if (is_array($room)) {
                foreach ($room as $roomItem) {
                    DB::table('img_rooms')
                       ->insert(
                          ['img_id' => $lastId,
                          'room_id' => $roomItem]
                         );
                }
            } else {
                DB::table('img_rooms')
                  ->insert(
                     ['img_id' => $lastId,
                     'room_id' => $room]
                     );
            }
        }
        if (Input::has('style')) {
            $style = $_POST['style'];
            if (is_array($style)) {
                foreach ($style as $styleItem) {
                    DB::table('img_rooms')
                      ->insert(
                         ['img_id' => $lastId,
                         'room_id' => $styleItem]
                         );
                }
            } else {
                DB::table('img_rooms')
                 ->insert(
                    ['img_id' => $lastId,
                    'room_id' => $style]
                    );
            }
        }
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
