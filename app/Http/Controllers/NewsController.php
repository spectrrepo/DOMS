<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Color;
use App\Style;
use App\Room;
use App\News;
use App\NewsVariant;

use Input;
use Image;

class NewsController extends Controller
{
    public function Index()
    {
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();
        $news = News::all();

        return view('site.news', ['news'  => $news,
                                  'colors' => $colors,
                                  'styles' => $styles,
                                  'rooms' => $rooms,
                                 ]);
    }

    public function addNews()
    {
        $news = new News;
        $news->title = $_POST['title'];
        $news->description = $_POST['min_description'];
        $news->full_description = $_POST['full_description'];
        $news->news = $_FILES['main_photo'];
        $news->variants = 'f';
        $news->save();

        $variantRes = "";
        if (!empty($_FILES['variants']['tmp_name'])){
            foreach ($_FILES['variants']['tmp_name'] as $variantItem) {

                $item = Image::make($variantItem);
                $item->encode('jpg');
                $item->save(public_path('/img/12.jpg'));

                $view = new NewsVariant();
                $view->news_variant = public_path('/img/12.jpg');
                $view->new_id = News::orderBy('id', 'desc')->first()->id;
                $view->save();
                $view->file_path_full = $view->news_variant->url('max');
                $view->save();

                $variantRes .= $view->id;
            }
        }

        $news->variants = $variantRes;
        $news->file_path_full = $news->news->url('max');
        $news->file_path_min = $news->news->url('small');
        $news->save();

        return redirect()->back();

    }

    public function delete($id)
    {
        $news = News::find($id)
                    ->delete();

        return redirect()->back();
    }

    public function edit ($id)
    {
        $news = News::find($id);
        $news->title = $_POST["title"];
        $news->description = $_POST["min_description"];
        $news->full_description = $_POST["full_description"];

        if ( !empty($_FILES['main_photo']['tmp_name'])) {
            $news->news = $_FILES['main_photo'];
        }

        $variantRes = "";
        if ( !empty($_FILES["variants"]['tmp_name'][0])) {
            foreach ($_FILES['variants']['tmp_name'] as $variantItem) {

                $item = Image::make($variantItem);
                $item->encode('jpg');
                $item->save(public_path('/img/12.jpg'));

                $view = new NewsVariant();
                $view->news_variant = public_path('/img/12.jpg');
                $view->new_id = News::orderBy('id', 'desc')->first()->id;
                $view->save();
                $view->file_path_full = $view->news_variant->url('max');
                $view->save();

                $variantRes .= $view->id;
            }
            $news->variants = $variantRes;
        }
        $news->update();

        return redirect()->back();
    }

    public function editPageIndex($id)
    {
        $news = News::find($id);

        return view('moderator.update_news',['news' => $news]);
    }

}
