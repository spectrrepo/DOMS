<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Input;
use Image;
use Auth;

use App\Models\Post;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\View;
use App\Models\Like;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Color;
use App\Models\Style;
use App\Models\Placement;

class PhotoController extends Controller
{

     /**
      * [sortCommon private method]
      * @param  [string] $table     [description]
      * @param  [string] $tableCell [description]
      * @param  [string] $itemSort  [description]
      * @return [array] $result [description]
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

     /**
      * [sortSort - private method]
      * @param  [string] $sort [description]
      * @return [array] $result [description]
      */
     private function sortSort ( $sort ) {
         if ($sort != 0) {
            switch ($sort) {
                    case 'popular':
                         $sortSort = ' ORDER BY Images.views_count DESC ';
                         break;

                    case 'recommended':
                         $sortSort = ' ORDER BY Images.id DESC ';
                         break;

                    case 'new':
                         $sortSort = ' ORDER BY Images.id DESC ';
                         break;

                    default:
                         $sortSort = ' ';
                         break;
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

     /**
      * [tagSort private method]
      * @param  [string] $tag [description]
      * @return [array] $result [description]
      */
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

     /**
      * [activeColor private method]
      * @param  [string] $what [description]
      * @param  [type] $id   [description]
      * @return [type] $colorActive [description]
      */
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

     /**
      * [addJoinData description]
      * @param [type] $prop_name  [description]
      * @param [type] $prop_table [description]
      * @param [type] $id_prop    [description]
      */
     private function addJoinData ($prop_name, $prop_table, $id_prop) {
          if (Input::has($prop_name)) {
              $properties = $_POST[$prop_name];
              if (is_array($properties)) {
                  foreach ($properties as $colorItem) {
                     DB::table($prop_table)
                          ->insert(
                             ['img_id' => $lastId,
                             'color_id' => $colorItem]
                            );
                  }
              } else {
                  DB::table($prop_table)
                     ->insert(
                        ['img_id' => $lastId,
                        $id_prop => $properties]
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

        $images = DB::select("SELECT Images.id AS id ,
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
                       ->where('Comments.status', '=', '"read"')
                       ->get();

        $num_comment = count($comments);
        $colorLike = $this->activeColor('like', $id);
        $colorLiked = $this->activeColor('liked', $id);

        $new_count = $image->views_count + 1;
        $imageCurrent->views_count = $new_count;
        $imageCurrent->save();

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
        $watermark = Image::make(public_path('/img/watermark-files/poloska.png'));
        $watermarkHouse = Image::make(public_path('/img/watermark-files/dom.png'));

        $img = Image::make($_FILES['photo']['tmp_name'])
                    ->insert($watermark, 'top', 0, 0)
                    ->insert($watermarkHouse, 'bottom-right', 30, 30)
                    ->save(public_path('/img/f.jpg'));

        $image = new Picture();
        $image->photo = public_path('/img/f.jpg');
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->author_id = $_POST['author_id'];
        $image->user_upload_id = $_POST['user_upload_id'];
        $image->verified = false;
        $lastId = Picture::orderBy('id', 'desc')->first()->id + 1;

        $this->addJoinData('color', 'img_colors',  'color_id');
        $this->addJoinData('room', 'img_rooms',  'room_id');
        $this->addJoinData('style', 'img_styles',  'style_id');

        $tags = explode(';', $_POST['data-tags']);
        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->title = $tag;
            $newTag->post_id = $lastId;
            $newTag->save();
        }

        if (!empty($_FILES['files']['tmp_name'])) {
            foreach ($_FILES['files']['tmp_name'] as $variantItem) {
                $watermarkView = Image::make(public_path('/img/watermark-files/poloska.png'));
                $watermarkHouseView = Image::make(public_path('/img/watermark-files/dom.png'));

                $imgView = Image::make($variantItem)
                                ->insert($watermarkView, 'top', 0, 0)
                                ->insert($watermarkHouseView, 'bottom-right', 30, 30)
                                ->save(public_path('/img/fv.jpg'));

                $view = new View();
                $view->photo = public_path('/img/fv.jpg');
                $view->user_id = $_POST["author_id"];
                $view->user_id = $_POST["author_id"];
                $view->save();
                $view->path_min = $view->photo->url('small');
                $view->path_full = $view->photo->url();
                $view->post_id = $lastId;
                $view->save();
            }
        }

        $image->save();
        $img2 = Image::make($_FILES['photo']['tmp_name'])
                     ->encode('jpg')
                     ->fit(400)
                     ->save(public_path('/img/quadro/'.$addInfo->id.'.jpg'));

        $image->quadro_photo = '/img/quadro/'.$addInfo->id.'.jpg';
        $image->full_path = $image->photo->url('max');
        $image->min_path = $image->photo->url('small');
        $image->save();

        return redirect('/profile/'.Auth::user()->id)->with('check', 'true');
    }

    public function addPhotoSite($id)
    {
        $image = Picture::find($id);
        $image->title = $_POST['title'];
        $image->description = $_POST['description'];
        $image->verified = true;

        if (!isset($_FILES['photo'])) {
             $image->photo = $_FILES['photo'];
        }

        $this->addJoinData('color', 'img_colors', 'img_id',  'color_id');
        $this->addJoinData('room', 'img_rooms', 'img_id',  'room_id');
        $this->addJoinData('style', 'img_styles', 'img_id',  'style_id');

        $variantRes = " ";
        if (!empty($_FILES['files']['tmp_name'])) {
            foreach ($_FILES['files']['tmp_name'] as $variantItem) {
                $watermarkView = Image::make(public_path('/img/watermark-files/poloska.png'));
                $watermarkHouseView = Image::make(public_path('/img/watermark-files/dom.png'));

                $imgView = Image::make($variantItem);
                $imgView->insert($watermarkView, 'top', 0, 0);
                $imgView->insert($watermarkHouseView, 'bottom-right', 30, 30);
                $imgView->save(public_path('/img/fv.jpg'));

                $view = new View();
                $view->photo = public_path('/img/fv.jpg');
                $view->user_id = $_POST["author_id"];
                $view->user_id = $_POST["author_id"];
                $view->save();
                $view->path_min = $updateViewInfo->photo->url('small');
                $view->path_full = $updateViewInfo->photo->url();
                $view->post_id = $id;
                $view->save();

                $variantRes .= $view->id.',';
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
