<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Models\Slide;

class SlidesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $slides = Slide::paginate(15);

        return view('profile.admin.slides.list', ['slides' => $slides]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add (Request $request)
    {
        $slide = new Slide();
        $this->validate($request, $slide->rules);

        $slide->text = Input::get('text');
        $slide->img = $this->saveFile('claims', 'default', Input::file('file'),'600');

        if (Input::has('alt')) {
            $slide->alt = Input::get("alt");
        }

        $slide->user_add = Auth::user()->id;
        $slide->save();

        return redirect()->back('message', 'слайд упешно добавлен!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Slide::find($id)->softDelete();

        return redirect()->back()->with('message', 'слайд успешно удален!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $id = Input::get('id');
        $slide = Slide::find($id);
        $this->validate($request, $slide->rules);

        $slide->text = Input::get('text');
        $slide->img = $this->saveFile('claims', 'default', Input::file('file'),'600');

        if (Input::has('alt')) {
            $slide->alt = Input::get("alt");
        }

        $slide->user_add = Auth::user()->id;
        $slide->update();

        return redirect()->back()->with('message', 'сладй успешно отредактирован');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $slide = Slide::find($id);

        return view('profile.admin.slides.edit', ['slide'=> $slide]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage ()
    {
        return view('profile.admin.slides.add');
    }
}
