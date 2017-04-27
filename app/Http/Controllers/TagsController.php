<?php
// checked
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use App\Models\Tag;

class TagsController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id){

      $tag = Tag::find($id);
      $tag->title = $_POST["title-tag"];
      $tag->save();

      return redirect()->back();
    }

    /**
     * @param $tagID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($tagID) {

        Tag::find($tagID)->delete();

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add() {
        
      $tags = new Tag();
      $tags->title = $_POST["title"];
      $tags->post_id = 0;
      $tags->save();

      return redirect()->back();

    }

    /**
     * @return mixed
     */
    public function indexTagsMask () {

        $currentText = $_POST['current'];
        $needTags = Tag::whereRaw('title like "%'.$currentText.'%"')->get();

        return $needTags;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editTagsPage()
    {
        $tags = Tag::paginate(10);
        return view('moderator.edit_tags', ['tags' => $tags]);
    }


    /**
     * @return array
     */
    public function dwnldTags()
    {

        $id = $_POST['id'];
        $image = Post::find($id);
        $tagsString = $image->tags;
        $tags = explode(';',$tagsString);

        return $tags;
    }


}
