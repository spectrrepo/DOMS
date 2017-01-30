<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Color;
use App\Style;
use App\Room;
use App\News;
use App\NewsVariant;

use Input;


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
        if (!empty($_FILES['main_photo']['tmp_name'])){
            $news->news = $_FILES['main_photo'];
        }

        $variantRes = "";
        if (!empty($_FILES['variants']['tmp_name'])){
            foreach ($_FILES['variants']['tmp_name'] as $variantItem) {
                $view = new NewsVariant();
                $view->news_variant = $variantItem;
                $view->save();
                $addInfo = NewsVariant::orderBy('id', 'desc')
                                ->first();
                $updateVariantsInfo = NewsVariant::find($addInfo->id);
                $updateVariantsInfo->file_path_full = $updateVariantsInfo->news_variant->url('max');
                $variantRes .= $updateVariantsInfo->id;
                $updateVariantsInfo->save();

            }
        }
        $news->variants = $variantRes;
        $news->save();
        $addInfo = News::orderBy('id', 'desc')
                        ->first();
        $updateIinfo = News::find($addInfo->id);
        $updateIinfo->file_path_full = $updateIinfo->news->url('max');
        $updateIinfo->file_path_min = $updateIinfo->news->url('small');
        $updateIinfo->save();

        return redirect()->back();

    }
    public function delete($id)
    {
        $news = News::find($id)->delete();
        return redirect()->back();
    }
    public function edit ($id)
    {
        $news = News::find($id);

        $news->title = $_POST["title"];
        $news->description = $_POST["min_description"];
        $news->full_description = $_POST["full_description"];

        if ( !isset($_FILES["main_photo"])) {
            $news->news = $_FILES['main_photo'];
        }

        if ( !isset($_FILES["variants"])) {
            foreach (Input::file('variants') as $variantItem) {
                $view = new NewsVariant();
                $view->news_variant = $variantItem;
                $view->save();
                $addInfo = NewsVariant::orderBy('id', 'desc')
                                ->first();
                $updateVariantsInfo = NewsVariant::find($addInfo->id);
                $updateVariantsInfo->file_path_full = $updateVariantsInfo->news_variant->url('max');
                $variantRes .= $updateVariantsInfo->id;
                $updateVariantsInfo->save();

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
