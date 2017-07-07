<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use App\Models\Placement;

class PlacementsController extends BasePhotoController
{
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($id)
    {
        Placement::find($id)->delete();

        return redirect()->back()->with('message', 'помещение успешно удалено');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add (Request $request)
    {
        $placement = new Placement();
        $this->validate($request, $placement->rules);

        $placement->title = Input::get("title");
        $placement->status = 1;
        $placement->img_middle = $this->saveFile('claims', 'default', Input::file('img'),'600');
        $placement->img_large = $this->saveFile('claims', 'default', Input::file('img'),'600');
        $placement->img_square = $this->saveFile('claims', 'default', Input::file('img'),'600');
        $placement->description = Input::get("description");
        $placement->full_description = Input::get("full_description");

        if (Input::has('alt')) {
            $placement->alt = Input::get("alt");
        }

        $placement->save();

        return redirect()->route('listPlacePage')->with('message', 'Помещение успешно добавлена!');

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $placement = Placement::find($id);
        $this->validate($request, $placement->rules);

        $placement->title = Input::get("title");
        $placement->status = Input::get("status");

        if (Input::has('img')) {
            $placement->img_middle = $this->saveFile('claims', 'default', Input::file('img'),'600');
            $placement->img_large = $this->saveFile('claims', 'default', Input::file('img'),'600');
            $placement->img_square = $this->saveFile('claims', 'default', Input::file('img'),'600');
        }

        $placement->description = Input::get("description");
        $placement->full_description = Input::get("full_description");

        if (Input::has('alt')) {
            $placement->alt = Input::get("alt");
        }

        $placement->update();

        return redirect()->route('listPlacePage')->with('message', 'Помещение успешно отредактировано!');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $placements = Placement::paginate(15);

        return view('profile.admin.filter.placements.list', ['placements' => $placements]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage ()
    {
        return view('profile.admin.filter.placements.add');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $placement = Placement::find($id);

        return view('profile.admin.filter.placements.edit', ['placement' => $placement]);
    }
}
