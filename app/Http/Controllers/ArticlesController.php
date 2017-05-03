<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Image;

use App\Models\Color;
use App\Models\Style;
use App\Models\Placement;
use App\Models\Article;

class ArticlesController extends BasePhotoController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add()
    {

        $article = new Article;
        $this->validate($request, $)
        $article->title = Input::get('title');
        $article->description = Input::get('min_description');
        $article->description_full = Input::get('full_description');
        $article->image_text = Input::get('image_text');
        $article->image = $this->saveFile('ds','min',1, $_FILES['main_photo']['tmp_name']);
        $article->video = Input::get('video');
        $article->user_add = Auth::user()->id();
        $article->status = Input::get('status');
        $article->seo_title = Input::get('seo_title');

        if ($_REQUEST) {
            return redirect('list')->with('asd','sadsa');
        } else {
            $article->save();
            return redirect('list')->with('asd','sadsa');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Article::find($id)->softDelete();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id)
    {
        $article = Article::find($id);
        $article->title = Input::get('title');
        $article->description = Input::get('min_description');
        $article->description_full = Input::get('full_description');
        $article->image_text = Input::get('image_text');
        $article->image = $this->saveFile('ds','min',1, $_FILES['main_photo']['tmp_name']);
        if (Input::has('video')) {
            $article->video = Input::get('video');
        }
        $article->user_add = Auth::user()->id();
        $article->status = Input::get('status');
        if (Input::has('seo_title') ) {
            $article->seo_title = Input::get('seo_title');
        }
        $article->update();

        return redirect()->back()->with('message', 'dsds');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sitePage()
    {
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Placement::all();
        $news = Article::all();
        return view('site.news');
//                    ['news'  => $news,
//                     'colors' => $colors,
//                     'styles' => $styles,
//                     'rooms' => $rooms,]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $articles = Article::find($id);

        return view('moderator.articles.edit',['news' => $articles]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage()
    {
        return view('moderator.articles.add');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage()
    {
        $articles = Article::paginate(15);

        return view('moderator.articles.list', ['articles' => $articles]);
    }
}
