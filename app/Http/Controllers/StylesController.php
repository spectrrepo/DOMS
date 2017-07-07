<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;

use App\Models\Style;

class StylesController extends BasePhotoController
{
    /**
     * @param $styleID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($styleID)
    {
        Style::find($styleID)->delete();

        return redirect()->back()->with('message', 'Стиль успешно удален!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add (Request $request)
    {
        $style = new Style();
        $this->validate($request, $style->rules);

        $style->title = Input::get('title');
        $style->status = true;
        $style->description = Input::get('description');
        $style->full_description = Input::get('full_description');
        $style->alt = Input::get('title');
        $style->img_middle = $this->saveFile('claims', 'default', Input::file('img'),'600');
        $style->img_large = $this->saveFile('claims', 'default', Input::file('img'),'600');
        $style->img_square = $this->saveFile('claims', 'default', Input::file('img'),'600');
        $style->save();

        return redirect()->route('listStylePage')->with('message', 'ноывый стиль успешно добавлен!');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit (Request $request, $id)
    {
        $style = Style::find($id);
        $this->validate($request, $style->rules);

        $style->title = Input::get('title');
        $style->status = Input::get('status');
        $style->description = Input::get('description');
        $style->full_description = Input::get('full_description');
        $style->alt = Input::get('title');
        if (Input::has('img')) {
            $style->img_middle = $this->saveFile('claims', 'default', Input::file('img'),'600');
            $style->img_large = $this->saveFile('claims', 'default', Input::file('img'),'600');
            $style->img_square = $this->saveFile('claims', 'default', Input::file('img'),'600');
        }
        $style->update();

        return redirect()->route('listStylePage')->with('message', 'стиль успешно изменен!');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $styles = Style::paginate(15);

        return view('profile.admin.filter.styles.list', ['styles' => $styles]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage ()
    {
        return view('profile.admin.filter.styles.add');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $style = Style::find($id);

        return view('profile.admin.filter.styles.edit',['style' => $style]);
    }
}
