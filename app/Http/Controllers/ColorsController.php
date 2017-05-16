<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use App\Models\Color;

class ColorsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add (Request $request)
    {
        $color = new Color();
        $this->validate($request, $color->rules);
        $color->title = Input::get('title');
        $color->hash = Input::get('hash');
        $color->save();

        return redirect()->back()->with('message', 'Новый цвет успешно добавлен');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit (Request $request, $id)
    {
        $color = Color::find($id);
        $this->validate($request, $color->rules);

        $color->title = Input::get('title');
        $color->hash = Input::get('hash');
        $color->update();

        return redirect()-back()->with('message', 'Цвет успешно изменен');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($id)
    {
        Color::find($id)->delete();

        return redirect()->back()->with('message', 'Цвет успешно удален');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $colors = Color::all();

        return view('moderator.colors.list', ['colors' => $colors]);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $color = Color::find($id);

        return view('moderator.colors.edit', ['color' => $color]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage ()
    {
        return view('moderator.colors.add');
    }
}