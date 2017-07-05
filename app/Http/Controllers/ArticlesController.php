<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;

use App\Models\Article;

class ArticlesController extends BasePhotoController
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add (Request $request)
    {

        $article = new Article;
        $this->validate($request, $article->rules);

        $article->title = Input::get('title');
        $article->description = Input::get('description');
        $article->description_full = Input::get('description_full');
        $article->image_text = Input::get('image_text');
        $article->user_add= Auth::user()->id;
        $article->status = Input::get('status');
        $article->img_middle = $this->saveFile('article','middle', Input::file('image'), 300, 400);
        $article->img_large = $this->saveFile('article','large', Input::file('image'), 300, 400);
        $article->img_square = $this->saveFile('article', 'square', Input::file('image'), 300);

        if (Input::has('alt')) {
            $article->alt = Input::get('alt');
        }

        if (Input::has('seo_title')) {
            $article->seo_title = Input::get('seo_title');
        }

        if (Input::has('seo_description')) {
            $article->seo_description = Input::get('seo_description');
        }

        if (Input::has('seo_keywords')) {
            $article->seo_keywords = Input::get('seo_keywords');
        }

        $article->save();

        return redirect('list')->with('message','Статья успешно добавлена');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($id)
    {
        Article::find($id)->softDelete();

        return redirect()-back()->with('message','Статья успешно удалена');
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id, Request $request)
    {
        $article = Article::find($id);
        $this->validate($request, $article->rules);

        $article->title = Input::get('title');
        $article->description = Input::get('description');
        $article->description_full = Input::get('description_full');
        $article->image_text = Input::get('image_text');
        $article->user_add= Auth::user()->id;
        $article->status = Input::get('status');
        $article->img_middle = $this->saveFile('article','middle', Input::file('image'), 300, 400);
        $article->img_large = $this->saveFile('article','large', Input::file('image'), 300, 400);
        $article->img_square = $this->saveFile('article', 'square', Input::file('image'), 300);

        if (Input::has('alt')) {
            $article->alt = Input::get('alt');
        }

        if (Input::has('seo_title')) {
            $article->seo_title = Input::get('seo_title');
        }

        if (Input::has('seo_description')) {
            $article->seo_description = Input::get('seo_description');
        }

        if (Input::has('seo_keywords')) {
            $article->seo_keywords = Input::get('seo_keywords');
        }

        $article->update();

        return redirect()->back()->with('message', 'Статья успешно отредактирована');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sitePage ()
    {
        $articles = Article::all();

        return view('site.news.index', ['articles'  => $articles]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $articles = Article::find($id);

        return view('moderator.articles.edit',['articles' => $articles]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage ()
    {
        return view('moderator.articles.add');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $articles = Article::paginate(15);

        return view('profile.moderator.articles.list', ['articles' => $articles]);
    }
}
