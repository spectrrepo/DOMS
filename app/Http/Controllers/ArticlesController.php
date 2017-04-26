<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Image;

use App\Color;
use App\Style;
use App\Placement;
use App\Article;

class ArticlesController extends Controller
{
    public function Index()
    {
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Placement::all();
        $news = Article::all();

        return view('site.news', ['news'  => $news,
                                       'colors' => $colors,
                                       'styles' => $styles,
                                       'rooms' => $rooms,
                                      ]);
    }

    public function addNews()
    {
        $news = new Article;
        $news->title = $_POST['title'];
        $news->description = $_POST['min_description'];
        $news->full_description = $_POST['full_description'];
        $news->news = $_FILES['main_photo'];
        $news->variants = 'f';
        $news->save();
        $news->file_path_full = $news->news->url('max');
        $news->file_path_min = $news->news->url('small');
        $news->save();

        return redirect()->back();

    }

    public function delete($id)
    {
        Article::find($id)->delete();

        return redirect()->back();
    }

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

    public function editPageIndex($id)
    {
        $news = Article::find($id);

        return view('moderator.update_news',['news' => $news]);
    }

}
