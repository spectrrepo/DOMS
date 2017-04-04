<?php
// checked
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Style;

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class StylesController extends Controller
{


    /**
     * @param
     *
     * @return
     *
     */
    public function delete ($styleID) {

        $tag = Style::find($styleID)
                     ->delete();

        return redirect()->back();

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add() {

        $style = new Style();
        $style->name = $_POST["title"];
        $style->description = $_POST["description"];
        $style->alt_text = 'DOMS стили';
        $style->photo = $_FILES["photo"];
        $style->save();

        return redirect()->back();
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function editPageIndex($id) {

      $style = Style::find($id);

      return view('moderator.update_style',['style' => $style]);
    }

    public function edit($id)
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
}
