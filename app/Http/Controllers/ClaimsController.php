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
        $claims = Claim::where('status', '=', 0)->paginate(15);

        return view('profile.moderator.claims.list', ['claims' => $claims]);

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
        $claim->status = 0;
        $claim->text = Input::get('text');
        $claim->save();

        return 'true';
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($id)
    {
        Claim::find($id)->delete();

        return redirect()->back()->with('message', 'Претензия успешно удалена');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeAuthorship ($id)
    {
        $claim = Claim::find($id);
        $claim->status = 1;
        $claim->update();

        $image = Post::find($claim->post_id);
        $image->author_id = $claim->user_id;
        $image->update();
        ModerateHistoriesController::add('claims', $id);

        return redirect()->back()->with('message', 'Авторство интерьера успешно изменено');

    }

}
