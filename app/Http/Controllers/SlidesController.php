<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\DB;
use App\Image;
use App\Input;

use App\Models\Slide;

class SlidesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $slides = DB::table('slides')->paginate(10);

        return view('moderator.slide_change', ['slides' => $slides]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add()
    {

        $image = Image::make($_FILES['photo']['tmp_name']);
        $image->encode('jpg');
        $image->save(public_path('img/about-slider/slide-'.$slides->id.'.jpg'));

        $slide = new Slide();
        $slide->text = $_POST['text'];
        $slide->photo = '/img/about-slider/slide-'.$slides->id.'.jpg';
        $slide->save();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete()
    {
        $id = $_POST['id'];
        Slide::find($id)->delete();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change()
    {
        $id = $_POST['id'];
        $slide = Slide::find($id);

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
