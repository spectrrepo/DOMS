<?php

namespace App\Http\Controllers;

use App\Models\ModerateHistory;
use Illuminate\Http\Request;
use Input;
use Auth;
use DB;

use App\Models\Post;
use App\Models\View;
use App\Models\Like;
use App\Models\User;
use App\Models\UserSocial;

class PostsController extends BasePhotoController
{
    /**
     * @param $what
     * @param $id
     * @return bool
     */
    private function activeColor ($what = false, $id)
    {
        $what === true ? $someClass = 'Favorite' : $someClass = 'Like';

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
     * @param array $array
     * @return string
     */
    private function getPartRequestDB ($array)
    {
        if ($array === null)
        {
            return null;
        }
        $request = ' ';
        foreach ($array as $item) {
            $request .= $item.' or ';
        }
        $request .=' 0 ';

        return $request;
    }

    /**
     * @param $json
     * @return array
     */
    private function decodeURL ($json)
    {
        $filterArray = json_decode($json, true);

        if ($filterArray == null) {
            $placements = null;
            $styles = null;
            $color = null;
            $sort = null;
            $tag = null;
        }

        array_key_exists('placements', $filterArray) ? $placements = $filterArray['placements'] : $placements = null;
        array_key_exists('styles', $filterArray) ? $styles = $filterArray['styles'] : $styles = null;
        array_key_exists('color', $filterArray) ? $color = $filterArray['color'] : $color = null;
        array_key_exists('sort', $filterArray) ? $sort = $filterArray['sort'] : $sort = null;
        array_key_exists('tag', $filterArray) ? $tag = $filterArray['tag'] : $tag = null;

        $placements = $this->getPartRequestDB($placements);
        $styles = $this->getPartRequestDB($styles);

        return [
            'placements' => $placements,
            'styles' => $styles,
            'color' => $color,
            'sort' => $sort,
            'tag' => $tag,
        ];
    }

    /**
     * @param $json
     * @return mixed
     */
    private function queryForPosts ($json)
    {
        $filterArray = $this->decodeURL($json);

        $placements = $filterArray['placements'];
        $styles = $filterArray['placements'];
        $color = $filterArray['placements'];
        $sort = $filterArray['placements'];
        $tag = $filterArray['placements'];

        $posts = Post::select('posts.id AS id' ,
                              'posts.img_middle AS img')
                      ->when($placements, function ($query) use ($placements){
                          return $query->join('posts_placements', 'posts.id', '=', 'posts_placements.post_id');
                      })
                      ->when($styles, function ($query) use ($styles){
                          return $query->join('posts_styles','posts.id', '=', 'posts_styles.post_id');
                      })
                      ->when($color, function ($query) use ($color){
                          return $query->join('posts_colors','posts.id', '=', 'posts_colors.post_id');
                      })
                      ->when($tag, function ($query) use ($tag){
                          return $query->join('posts_tags', 'posts.id', '=', 'posts_tags.post_id')
                                       ->join('tags', 'tags.id', '=', 'posts_tags.tag_id');
                      })
                      ->when($placements, function ($query) use ($placements){
                          return $query->where(DB::raw($placements));
                      })
                      ->when($styles, function ($query) use ($styles){
                          return $query->where(DB::raw($styles));
                      })
                      ->when($color, function ($query) use ($color){
                          return $query->where('posts_colors.color_id', '=', $color);
                      })
                      ->when($tag, function ($query) use ($tag){
                          return $query->where('tags.value', '=', $tag);
                      })
                      ->where('posts.status', '=', 'true')
                      ->groupBy('posts.id')
                      ->when($sort === "recommended", function ($query) use ($sort) {
                          return $query->orderBy('posts.updated_at', 'desc')
                                       ->orderBy('posts.views', 'desc');
                      })
                      ->when($sort === "popular", function ($query) use ($sort) {
                          return $query->orderBy('posts.views', 'desc');
                      })
                      ->when($sort === "new", function ($query) use ($sort) {
                          return $query->orderBy('posts.updated_at', 'desc');
                      });
        return $posts;
    }
    /**
     * @param $json
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexPage ($json = null)
    {

        $posts = $this->queryForPosts($json)
                      ->take(32)
                      ->get();

        return view('site.gallery.index', [
                         'posts' => $posts,
                         'json' => $json
        ]);
    }


    /**
     * @param $id
     * @param null $json
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemPage($id, $json = null)
    {
        $posts = $this->queryForPosts($json)
                      ->skip($id-1)
                      ->take(6)
                      ->get();

        $numPosts = $this->queryForPosts($json)->count();
        $currentPost = Post::find($id);
        $likes = LikesController::loadLikeWhomThree($id);
        $numLikes = Like::all()->count();
        $postAuthor = User::find($currentPost->author_id);
        $tags = TagsController::loadTagsForPost($id);
        $views = View::where('post_id', '=', $id)->get();
        $comments = CommentsController::threeCommentsLoad();
        $numComments = count($comments);
        $colorLike = $this->activeColor('like', $id);
        $colorFavorite = $this->activeColor('liked', $id);
        $currentPost->views += 1;
        $currentPost->save();

        return view('site.slider', ['postAuthor' => $postAuthor,
                                         'posts' => $posts,
                                         'currentPost' => $currentPost,
                                         'comments' => $comments,
                                         'tags' => $tags,
                                         'likes' => $likes,
                                         'views' => $views,
                                         'numPosts' => $numPosts,
                                         'numLike' => $numLikes,
                                         'numComment' => $numComments,
                                         'colorLike' => $colorLike,
                                         'colorFavorite' => $colorFavorite,
                                         ]);
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
        $post->img_mini = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
        $post->img_middle = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
        $post->img_large = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
        $post->img_square = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
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

        $post->img_mini = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
        $post->img_middle = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
        $post->img_large = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
        $post->img_square = $this->saveFileWithWatermark('claims', 'default', Input::file('file'),'600');
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
            ModerateHistoriesController::add('posts', $id);
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userPosts ($id)
    {
        $user = User::find($id);
        $userImages = Post::where('author_id', '=', $id)->get();
        $links = UserSocial::where('user', '=', $id)->get();

        return View('profile.index_photo', [
                                                  'user' => $user,
                                                  'links' => $links,
                                                  'userImages' => $userImages
                                                ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $post = Post::find($id);

        return view('', ['post' => $post]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage()
    {
        return View('profile.user.add');
    }

    /**
     * @param $currentID
     * @param $action
     * @param $json
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadSliderPost ($currentID, $action, $json)
    {
        switch ($action) {
            case 'next':
                $array = [
                    "postInfo" =>  $this->loadInfoPost($currentID),
                    "posts" => $this->loadMorePosts($currentID, 23, $json),
                ];
                break;
            case 'prev':
                $array = [
                    "postInfo" =>  $this->loadInfoPost($currentID),
                    "posts" => $this->loadMorePosts($currentID, 23, $json),
                ];
                break;
            case 'sort':
                $array = [
                    "postInfo" =>  $this->loadInfoPost($currentID),
                    "posts" => $this->loadSortPosts($json, 23),
                ];
                break;
            default:
                $array = ['error' => 'переменная $action не входит в массив значений ["next", "prev", "sort"]'];
        }
        return response()->json($array);
    }

    /**
     * @param $json
     * @param $action
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadGallery ($json, $action, $id)
    {
        switch ($action) {
            case 'next':
                $posts = $this->loadMorePosts($id, 23, $json);
                break;
            case 'sort':
                $posts = $this->loadSortPosts($id, 23);
                break;
            default:
                $posts = 'error';
        }
        return response()->json($posts->toArray());
    }

    /**
     * @param $prevId
     * @param $num
     * @param $json
     * @return mixed
     */
    private function loadMorePosts ($prevId, $num, $json)
    {
        $posts = $this->queryForPosts($json)
                      ->skip($prevId)
                      ->take($num)
                      ->get();

        return $posts;
    }

    /**
     * @param $id
     * @return array
     */
    private function loadInfoPost ($id)
    {
        $comments = CommentsController::threeCommentsLoad($id);
        $tags = TagsController::loadTagsForPost($id);
        $userInfo = UserController::loadPhotoUser($id);
        $likes = LikesController::loadLikeWhomThree($id);
        $angles = ViewsController::loadForPost($id);
        $numComments = CommentsController::numComments($id);
        $numLikes = LikesController::numLikes($id);
        $userLike = $this->activeColor(false, $id);
        $userFavorite = $this->activeColor(true, $id);
        $post = Post::find($id);

        return [
            "id" => $post->id,
            "bigPost" => $post->img_large,
            "title" => $post->title,
            "description" => $post->description,
            "userInfo" => $userInfo,
            "numViews" => $post->views,
            "numComments" => $numComments,
            "numLikes" => $numLikes,
            "userLike" => $userLike,
            "userFavorite" => $userFavorite,
            "likes" => $likes,
            "comments" => $comments,
            "tags" => $tags,
            "angles" => $angles,
        ];
    }

    /**
     * @param $json
     * @param $num
     * @return mixed
     */
    private function loadSortPosts ($json, $num)
    {
        $posts = $this->queryForPosts($json)
                      ->take($num)
                      ->get();

        return $posts;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmationsPage()
    {
        $posts = Post::where('verified', '=', false)
                     ->paginate(10);

        return view('moderator.wait_confirmation', ['posts' => $posts]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function addPostSite($id)
    {
        $image = Post::find($id);
        $image->status = true;
        $image->save();
        ModerateHistoriesController::add('posts', $id);

        return redirect()->back()-with('success', 'er');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteVerificationPost($id)
    {
        Post::find($id)->delete();
        ModerateHistoriesController::add('posts', $id);

        if ( Auth::user()->status == 'moderator') {
            return redirect('/profile/admin/verification');
        }else {
            return redirect('/profile/'.Auth::user()->id)->with('check', 'delete');
        }
    }
}
