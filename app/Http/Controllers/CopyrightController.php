<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Picture;
use Image;
use App\Pretense;

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class CopyrightController extends Controller
{
    /**
     * @param
     *
     * @return
     *
     */
    public function index(){

      $copyrights = Pretense::paginate(10);

      return view('moderator.copyright_index', ['copyrights' => $copyrights]);

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        $photo = Image::make($_FILES['file_pretense']['tmp_name']);
        $photo->save( public_path('/img/f.jpg'));

        $copyright = new Pretense();
        $copyright->photo_pretense = public_path('/img/f.jpg');
        $copyright->post_id = $_POST['post_id'];
        $copyright->user_pretense_id = Auth::user()->id;
        $copyright->user_author_id = Picture::find($_POST['post_id'])->author_id;
        $copyright->message = $_POST['text_pretense'];

        $copyright->save();

        return 'true';
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete(){

        $id = $_POST['id'];

        $copyright = Pretense::find($id);
        $copyright->delete();

        return redirect()->back();

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function saveNewCopyright(){

        $id = $_POST['id'];

        $copyright = Pretense::find($id);
        $copyright->status = 'read';
        $copyright->save();

        $imageChange = Picture::find($copyright->post_id);
        $imageChange->author_id = $copyright->user_pretense_id;
        $imageChange->save();

        return redirect()->back();

    }

}
