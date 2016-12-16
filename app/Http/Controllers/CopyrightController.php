<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Picture;
use App\Copyright;

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

      $copyrights = Copyright::paginate(10);

      return view('moderator.copyright_index', ['copyrights' => $copyrights]);

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        $copyright = new Copyright();
        $copyright->photo = $_POST['photo'];
        $copyright->post_id = $_POST['post_id'];
        $copyright->user_pretense_id = $_POST['user_pretense_id'];
        $copyright->user_author_id = $_POST['user_author_id'];
        $copyright->message = $_POST['message'];

        $copyright->save();
        return redirect()->back();
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete($id){

        $copyright = Copyright::find($id);
        $copyright->delete();

        return redirect()->back();

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function saveNewCopyright($id){

        $copyright = Copyright::find($id);

        return redirect()->back();

    }

}
