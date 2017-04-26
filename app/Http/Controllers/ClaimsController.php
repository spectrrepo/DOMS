<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Models\Post;
use Image;
use App\Models\Claim;

class ClaimsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $copyrights = Claim::paginate(10);

        return view('moderator.copyright_index', ['copyrights' => $copyrights]);

    }

    /**
     * @return string
     */
    public function add(){

        $photo = Post::make($_FILES['file_pretense']['tmp_name']);
        $photo->save( public_path('/img/f.jpg'));

        $copyright = new Claim();
        $copyright->photo_pretense = public_path('/img/f.jpg');
        $copyright->post_id = $_POST['post_id'];
        $copyright->user_pretense_id = Auth::user()->id;
        $copyright->user_author_id = Picture::find($_POST['post_id'])->author_id;
        $copyright->message = $_POST['text_pretense'];

        $copyright->save();

        return 'true';
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(){

        $id = $_POST['id'];

        Claim::find($id)->delete();

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveNewCopyright(){

        $id = $_POST['id'];

        $copyright = Claim::find($id);
        $copyright->status = 'read';
        $copyright->save();

        $imageChange = Post::find($copyright->post_id);
        $imageChange->author_id = $copyright->user_pretense_id;
        $imageChange->save();

        return redirect()->back();

    }

}
