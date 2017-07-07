<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Input;
use Image;
use Illuminate\Support\Facades\Storage;

class RolesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $roles = Role::all();

        return view('profile.admin.roles.list', ['roles' => $roles]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage ($id)
    {
        $role = Role::find($id);

        return view('profile.admin.roles.edit', ['role' => $role]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id)
    {
        $role = Role::find($id);

        $role->name = Input::get('name');

        if (Input::file('img')) {
            $img = Image::make(Input::file('img'))->encode('jpg', 70);
            $fileName = md5(microtime() . rand(0, 9999));
            $path = 'public/roles/default/'.$fileName.'.png';

            Storage::put($path, $img);

            $role->img = $path;
        }

        $role->text = Input::get('text');

        $role->save();

        return redirect()->route('listRolesPage')->with('message', 'Роль успешно обновлена');
    }
}
