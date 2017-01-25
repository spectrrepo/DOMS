<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag;

use Carbon\Carbon;


/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class TagsController extends Controller
{

    /**
     * @param
     *
     * @return
     *
     */
    public function edit ($id){

      $tag = Tag::find($id);
      $tag->title = $_POST["title-tag"];
      $tag->save();

      return redirect()->back();
    }

    /**
     * @param
     *
     * @return
     *
     */
    public function delete ($tagID) {

        $tag = Tag::find($tagID)->delete();
        return redirect()->back();

    }

    /**
     * @param
     *
     * @return
     *
     */
    public function add() {
      $tags = new Tag();

      $tags->title = $_POST["title"];
      $tags->post_id = 0;
      $tags->save();

      return redirect()->back();

    }

    public function indexTagsMask () {

        $currentText = $_POST['current'];
        $needTags = Tag::whereRaw('title like "%'.$currentText.'%"')->get();

        return $needTags;
    }

}
