<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Image;

use App\Models\Color;
use App\Models\Style;
use App\Models\Placement;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $colors = Color::all();
//        $styles = Style::all();
//        $rooms = Placement::all();
        $news = Article::all();
//        print_r($news);
        return view('moderator.news');
//                    ['news'  => $news,
//                     'colors' => $colors,
//                     'styles' => $styles,
//                     'rooms' => $rooms,]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add()
    {
        $news = new Article;
        $news->title = $_POST['title'];
        $news->description = $_POST['min_description'];
        $news->description_full = $_POST['full_description'];
        $news->image_text = '$_FILES[]';
//        dd($_FILES['main_photo']);
        $news::$photo = $_FILES['main_photo'];
//        $news->video = '$_FILES['main_photo']';
        $news->user_add = 1/*$_FILES['main_photo']*/;
        $news->status = true;
        $news->save();

        return redirect()->back();

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Article::find($id)->delete();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id)
    {
        $news = Article::find($id);
        $news->title = $_POST["title"];
        $news->description = $_POST["min_description"];
        $news->full_description = $_POST["full_description"];

        if ( !empty($_FILES['main_photo']['tmp_name'])) {
            $news->news = $_FILES['main_photo'];
        }

        $news->update();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $news = Article::find($id);

        return view('moderator.update_news',['news' => $news]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newsItem()
    {
        return view('moderator.news');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newsList()
    {
        $news = Article::all();

        return view('moderator.add_news', ['news' => $news]);
    }
}
