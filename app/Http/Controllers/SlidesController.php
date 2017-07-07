<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Models\Slide;
use Image;
use Illuminate\Support\Facades\Storage;

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

        $img = Image::make('img')->encode('jpg', 70);
        $fileName = md5(microtime() . rand(0, 9999));
        $path = 'public/slides/default/'.$fileName.'.png';

        Storage::put($path, $img);

        $slide->img = $path;

        $slide->alt = Input::get("text");

        $slide->user_add = Auth::user()->id;
        $slide->save();

        return redirect()->route('listSlidesPage')->with('message', 'слайд упешно добавлен!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Slide::find($id)->delete();

        return redirect()->back()->with('message', 'слайд успешно удален!');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $slide = Slide::find($id);
        if (!Input::has('text'))
        {
            return redirect()->back()->with('error', 'Заполните поле text');
        }
        $slide->text = Input::get('text');
        if (Input::file('img'))
        {
            $img = Image::make('img')->encode('jpg', 70);
            $fileName = md5(microtime() . rand(0, 9999));
            $path = 'public/slides/default/'.$fileName.'.png';

            Storage::put($path, $img);

            $slide->img = $path;
        }

        $slide->alt = Input::get("text");

        $slide->user_add = Auth::user()->id;
        $slide->update();

        return redirect()->route('listSlidesPage')->with('message', 'сладй успешно отредактирован');
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
