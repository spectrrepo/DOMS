<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Slide;

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

        $slides = Slide::all()->paginate(10);

        return view('moderator.slide_change', ['slides' => $slides]);
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        $slide = new Slide();
        $slide->photo = $_POST['photo'];
        $slide->text = $_POST['text'];

        $slide->save();
        return redirect()->back();
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete($id){

        $slide = Slide::find($id);
        $slide->delete();

        return redirect()->back();

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function change($id){

        $slide = Slide::find($id);
        $slide->text =  $_POST['text'];
        $slide->photo =  $_POST['photo'];

        $slide->save();

        return redirect()->back();

    }

}
