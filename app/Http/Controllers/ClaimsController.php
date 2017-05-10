<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;

use App\Models\Claim;
use App\Models\Post;

class ClaimsController extends BasePhotoController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $claims = Claim::paginate(15);

        return view('moderator.copyright_index', ['claims' => $claims]);

    }

    /**
     * @param Request $request
     * @return string
     */
    public function add (Request $request)
    {
        $claim = new Claim();
        $this->validate($request, $claim->rules);

        $claim->file = $this->saveFile('claims', 'default', Input::file('file'),'600');
        $claim->post_id = Input::get('post_id');
        $claim->user_id = Auth::user()->id;
        $claim->status = Input::get('status');
        $claim->text = Input::get('text');
        $claim->save();

        return 'true';
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ()
    {

        Claim::find(Input::get('id'))->softDelete();

        return redirect()->back()->with('message', 'Претензия успешно удалена');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeAuthorship ()
    {
        $claim = Claim::find(Input::get('id'));
        $claim->status = true;
        $claim->update();

        $image = Post::find($claim->post_id);
        $image->author_id = $claim->user_id;
        $image->update();

        return redirect()->back()->with('message', 'Авторство фотографии успешно изменено');

    }

}
