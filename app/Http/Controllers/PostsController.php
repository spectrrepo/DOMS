<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Input;
use Image;
use Auth;

use App\Models\Post;
use App\Models\Tag;
use App\Models\View;
use App\Models\Like;
use App\Models\User;
use App\Http\Controllers\TagsController;

class PostsController extends BasePhotoController
{
    /**
     * @param $what
     * @param $id
     * @return bool
     */
    private function activeColor ($what, $id)
    {
        $what === 'liked' ? $someClass = 'Favorite' : $someClass = 'Like';

        $activeThisUser = $someClass::where('user_id', '=', Auth::id())
                                    ->where('post_id', '=', $id)
                                    ->get()
                                    ->toArray();

        !empty($activeThisUser) ? $colorActive = true : $colorActive = false;

        return $colorActive;
    }

    /**
     * @param $prop_name
     * @param $prop_table
     * @param $id_prop
     * @param $lastId
     */
    private function addJoinData ($prop_name, $prop_table, $id_prop, $lastId)
    {
        if (Input::has($prop_name)) {
            $properties = Input::get($prop_name);
            foreach ($properties as $colorItem) {
                DB::table($prop_table)
                  ->insert([
                      'img_id' => $lastId,
                      $id_prop => $colorItem
                      ]);
            }
        }
    }

    /**
     * @param int $room
     * @param int $style
     * @param int $color
     * @param int $sort
     * @param int $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexPage($room = 0, $style = 0, $color = 0, $sort = 0, $tag = 0)
    {
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

        return view('site.index', [
                         'images' => $images,
                         'tag' => $tag,
                         'room' => $room,
                         'style' => $style,
                         'color' => $color,
                         'sort' => $sort
                 ]);
    }



    /**
     * @param $id
     * @param int $room
     * @param int $style
     * @param int $color
     * @param int $sort
     * @param int $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemPage($id, $room = 0, $style = 0, $color = 0, $sort = 0, $tag = 0)
    {
        $posts = Post::select('Images.id AS id' ,
                     'Images.author_id AS author_id',
                     'Images.full_path AS photo',
                     'Images.views_count AS views',
                     'Images.title AS title',
                     'Images.description AS description')
                    ->when($var, function ($query) use ($var){
                        return $query->join();
                    })
                    ->when($var, function ($query) use ($var){
                        return $query->join();
                    })
                    ->when($var, function ($query) use ($var){
                        return $query->join();
                    })
                    ->when($var, function ($query) use ($var){
                        return $query->where();
                    })
                    ->when($var, function ($query) use ($var){
                        return $query->where();
                    })
                    ->when($var, function ($query) use ($var){
                        return $query->where();
                    })
                    ->when($var, function ($query) use ($var){
                        return $query->where();
                    })
                    ->where()
                    ->groupBy()
                    ->when();


        $num_image = count($images);

        if (empty($imageCurrent)) {
            $imageCurrent = Post::whereRaw($roomsArray['Condition'].' and '
                .$stylesArray['Condition'].' and '
                .$colorsArray['Condition'])
                ->where('id', '>', $id)
                ->first();

            if (empty($image)) {
                $imageCurrent = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort)
                    ->where('id', '<', $id)
                    ->first();
            } else {
                $imageCurrent = false;
            }
        }

        $likes = Like::where('post_id', '=', $id)->get();
        $num_like = $likes->count();
        $likeWhom = loadLikeWhom();
        $user = User::find($imageCurrent[0]->author_id);
        $tags = Tag::where('post_id', '=', $id)->get();
        $views = View::where('post_id', '=', $id)->get();
        $comments = CommentsController::threeCommentsLoad();
        $num_comment = count($comments);
        $colorLike = $this->activeColor('like', $id);
        $colorLiked = $this->activeColor('liked', $id);

        $imageCurrent->views_count += 1;
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $post = new Post();
        $this->validate($request, $post->rules);

        if (Input::has('title')) {
            $post->title = Input::get('title');
        }

        if (Input::has('description')) {
            $post->description = Input::get('description');
        }

        $post->author_id = Auth::user()->id;
        $post->views = 0;
        $post->status = false;
        $post->img_mini = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->img_middle = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->img_large = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->img_square = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->seo_title = '';
        $post->seo_description = '';
        $post->seo_keywords = '';
        $post->alt = '';
        $post->save();

        if (Input::has('color')) {
            $this->addJoinData('color', 'img_colors',  'color_id', $post->id);
        }

        if (Input::has('placement')) {
            $this->addJoinData('placement', 'img_placements',  'room_id', $post->id);
        }

        if (Input::has('style')) {
            $this->addJoinData('style', 'img_styles',  'style_id', $post->id);
        }

        if (Input::has('data-tags'))
        {
            $tags = Input::get('data-tags');
            foreach ($tags as $tag) {
                TagsController::addTagForPost ($tag, $post->id);
            }
        }

        if (Input::has('views')) {
            $views = Input::file('views');
            foreach ($views as $view) {
                ViewsController::add($view, $post->id);
            }
        }

        return redirect('/profile/'.Auth::user()->id)->with('message', 'Фотография успешно добавлена');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request, $post->rules);

        if (Input::has('title')) {
            $post->title = Input::get('title');
        }

        if (Input::has('description')) {
            $post->description = Input::get('description');
        }

        $post->author_id = Auth::user()->id;

        if (Auth::user()->status == 'moderator' || Auth::user()->status == 'administrator') {
            $post->status = true;
        } else {
            $post->status = false;
        }

        $post->img_mini = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->img_middle = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->img_large = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->img_square = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $post->seo_title = '';
        $post->seo_description = '';
        $post->seo_keywords = '';
        $post->alt = '';
        $post->save();

        if (Input::has('color')) {
            $this->addJoinData('color', 'img_colors',  'color_id', $post->id);
        }

        if (Input::has('placement')) {
            $this->addJoinData('placement', 'img_placements',  'room_id', $post->id);
        }

        if (Input::has('style')) {
            $this->addJoinData('style', 'img_styles',  'style_id', $post->id);
        }

        if (Input::has('data-tags'))
        {
            $tags = Input::get('data-tags');
            foreach ($tags as $tag) {
                TagsController::addTagForPost ($tag, $post->id);
            }
        }

        if (Input::has('views')) {
            $views = Input::file('views');
            foreach ($views as $view) {
                ViewsController::add($view, $post->id);
            }
        }

        if (Auth::user()->status == 'moderator' || Auth::user()->status == 'administrator') {
            return redirect()->back();
        } else {
            return redirect('/profile/'.Auth::id())->with('check', 'true');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allPostSite()
    {
        $images = DB::table('Images')->paginate(10);

        return view('moderator.all_photo_site', ['images' => $images]);
    }

//____====================================================================================================\\
//++++====================================================================================================\\
//++++====================================================================================================\\
//++++===================================дальше идет ересь================================================\\
//++++====================================================================================================\\
//++++====================================================================================================\\
//----====================================================================================================\\
    /**
     * @return mixed
     */
    public function loadInfoPhoto()
    {

        $id = $_POST['id'];
        $photoInfo = Post::select('id',
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

    /**
     * @return string
     */
    public function loadPhotoSlider()
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

                $newPhoto = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true and id < '.$id)
                    ->take(3)
                    ->orderBy($sortSort, 'desc')
                    ->get();
                if (empty($newPhoto->toArray())) {
                    $newPhoto = 'error_download';
                }
            }else {
                $newPhoto = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true ')
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
                $newPhoto = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true and id < '.$id)
                    ->take(3)
                    ->get();
                $sortSort = false;
                if (empty($newPhoto->toArray())) {
                    $newPhoto = 'error_download';
                }
            }else {
                $newPhoto = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
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

    /**
     * @return string
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
            $ajaxImage = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                ->take(3)
                ->orderBy($sortSort, 'desc')
                ->get();
            if (empty($ajaxImage->toArray())) {
                $ajaxImage = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                    ->where('id', '>', $id)
                    ->get();
                if (empty($ajaxImage->toArray())) {
                    $ajaxImage = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                        ->where('id', '<', $id)
                        ->get();
                } else {
                    $ajaxImage = 'error_download';
                }
            }
        } else {
            $ajaxImage = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                ->take(3)
                ->get();
            if (empty($ajaxImage->toArray())) {
                $ajaxImage = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
                    ->where('id', '>', $id)
                    ->get();

                if (empty($ajaxImage->toArray())) {
                    $ajaxImage = Post::whereRaw($roomSort.' and '.$styleSort.' and '.$colorSort.$tagSort.' and verified=true')
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
     * @return mixed
     */
    public function indexAddPage()
    {
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

    /**
     * @return string
     */
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
}
