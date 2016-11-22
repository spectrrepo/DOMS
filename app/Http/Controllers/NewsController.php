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

        return view('site.news', ['colors' => $colors,
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

        $variantRes = "";
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
        $news->save();
        $addInfo = News::orderBy('id', 'desc')
                        ->first();
        $updateIinfo = News::find($addInfo->id);
        $updateIinfo->file_path_full = $updateIinfo->news->url('max');
        $updateIinfo->file_path_min = $updateIinfo->news->url('small');
        $updateIinfo->save();

        return redirect()->back();

    }
}
