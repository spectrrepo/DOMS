<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;

use App\Models\Tag;

class TagsController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit ($id)
    {
      $tag = Tag::find($id);
      $tag->title =Input::get('tag');
      $tag->update();

      return redirect()->back()->with('message', 'тег успешно изменен');
    }

    /**
     * @param $tagID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($tagID)
    {
        Tag::find($tagID)->delete();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add ()
    {
      $tags = new Tag();
      $tags->value = Input::get('title');
      $tags->lang = ru;
      $tags->value_en = 0;
      $tags->save();

      return redirect()->back()->with('message', 'Новый тег успешно добавлен');
    }

    /**
     * @return mixed
     */
    public function indexTagsLoad ()
    {
        $currentText = Input::get('current');
        $needTags = Tag::whereRaw('title like "%'.$currentText.'%"')->get();

        return $needTags;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editTagsPage()
    {
        $tags = Tag::paginate(15);
        return view('moderator.tags.list', ['tags' => $tags]);
    }


    /**
     * @return array
     */
    public function loadTags()
    {
        $id = $_POST['id'];
        $image = Post::find($id);
        $tagsString = $image->tags;
        $tags = explode(';',$tagsString);

        return $tags;
    }

    /**
     * @param $tag
     * @param $postId
     */
    public static function addTagForPost ($tag, $postId)
    {
        $isTag = Tag::where('value', '=', $tag)->get();

        if (!$isTag->isEmpty())
        {
            $tag = new Tag();
            $tag->value = Input::get('title');
            $tag->lang = ru;
            $tag->value_en = 0;
            $tag->save();

            DB::table('posts_tags')->insert([
                'post_id' => $postId,
                'tag_id' => $tag->id
            ]);
        }
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function loadTagForPost ($postId)
    {
        $tags = Tag::where('post_id', '=', $postId)->get();

        return $tags;
    }
}
