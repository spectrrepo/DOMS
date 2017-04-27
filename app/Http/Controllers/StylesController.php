<?php
// checked
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Style;

class StylesController extends Controller
{


    /**
     * @param $styleID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($styleID)
    {

        Style::find($styleID)->delete();

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add ()
    {

        $style = new Style();
        $style->name = $_POST["title"];
        $style->description = $_POST["description"];
        $style->alt_text = 'DOMS стили';
        $style->photo = $_FILES["photo"];
        $style->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPageIndex ($id)
    {

      $style = Style::find($id);

      return view('moderator.update_style',['style' => $style]);
    }

    public function edit ($id)
    {
        $style = Style::find($id);
        $style->name = $_POST["title"];
        $style->description = $_POST["description"];
        $style->alt_text = 'DOMS стили';

        if ( !isset($_FILES["photo"])) {
            $style->photo = $_FILES["photo"];
        }

        $style->save();

        return redirect()->back();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editStylesPage ()
    {
        $styles = Style::paginate(10);
        return view('moderator.edit_styles', ['styles' => $styles]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addStyleItem ()
    {
        return view('moderator.style');
    }
}
