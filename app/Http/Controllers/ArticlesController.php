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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {

        $article = new Article;
        $this->validate($request->all(), $article->rules);



        $article->save([
            'title' => Input::get('title'),
            'description' => Input::get('min_description'),
            'description_full' => Input::get('full_description'),
            'image_text' => Input::get('image_text'),
            'image' => $this->saveFile('ds','min',1, $_FILES['main_photo']['tmp_name']),
            'video' => Input::get('video'),
            'user_add' => Auth::user()->id(),
            'status' => Input::get('status'),
            'seo_title' => Input::get('seo_title'),
        ]);

        return redirect('list')->with('message','success');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Article::find($id)->softDelete();

        return redirect()->back()->with('message', 'success');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id)
    {
        $article = Article::find($id);
        $this->validate($request->all(), $article->rules);

        $article->update([
            'title' => Input::get('title'),
            'description' => Input::get('min_description'),
            'description_full' => Input::get('full_description'),
            'image_text' => Input::get('image_text'),
            'image' => $this->saveFile('ds','min',1, $_FILES['main_photo']['tmp_name']),
            'video' => Input::get('video'),
            'user_add' => Auth::user()->id(),
            'status' => Input::get('status'),
            'seo_title' => Input::get('seo_title'),
        ]);

        return redirect()->back()->with('message', 'dsds');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sitePage()
    {

        $news = Article::all();
        return view('site.news');
//                    ['news'  => $news]);
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
