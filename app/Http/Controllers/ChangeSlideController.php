<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Slides;
use DB;
use Image;
use Input;



/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class ChangeSlideController extends Controller
{
    /**
     * @param
     *
     * @return
     *
     */
    public function index(){

        $slides = DB::table('slides')->paginate(10);

        return view('moderator.slide_change', ['slides' => $slides]);
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add(){

        $slide = new Slides();
        $slide->text = $_POST['text'];

        $slide->save();

        $slides = Slides::orderBy('id', 'desc')->first();
        $image = Image::make($_FILES['photo']['tmp_name']);
        $image->encode('jpg');
        $image->save(public_path('img/about-slider/slide-'.$slides->id.'.jpg'));
        $slides->photo = '/img/about-slider/slide-'.$slides->id.'.jpg';
        $slides->save();
        return redirect()->back();
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete(){

        $id = $_POST['id'];
        $slide = Slides::find($id);
        $slide->delete();

        return redirect()->back();

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function change(){

        $id = $_POST['id'];
        $slide = Slides::find($id);
        if (Input::has('text')) {
            $slide->text = $_POST['text'];
        }

        if (!empty($_FILES['photo']['tmp_name'])) {
            $image = Image::make($_FILES['photo']['tmp_name']);
            $image->encode('jpg');
            $image->save(public_path($slide->photo));
        }
        $slide->save();

        return redirect()->back();

    }

}
