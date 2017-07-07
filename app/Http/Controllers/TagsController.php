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
      $tag->value =Input::get('tag');
      $tag->update();

      return redirect()->route('listTagPage')->with('message', 'тег успешно изменен');
    }

    /**
     * @param $tagID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($tagID)
    {
        Tag::find($tagID)->delete();

        return redirect()->back()->with('message', 'тег успешно удален');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add ()
    {
      $tags = new Tag();
      $tags->value = Input::get('title');
      $tags->lang = 'ru';
      $tags->value_en = 0;
      $tags->save();

      return redirect()->route('listTagPage')->with('message', 'Новый тег успешно добавлен');
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
    public function editPage($id)
    {
        $tag = Tag::find($id);

        return view('profile.admin.filter.tags.edit', ['tag' => $tag]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $tags = Tag::paginate(15);

        return view('profile.admin.filter.tags.list', ['tags' => $tags]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPage ()
    {
        return view('profile.admin.filter.tags.add');
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
     * @param $id
     * @return mixed
     */
    public static function loadTagsForPost ($id)
    {
        $tags = Tag::join('posts_tags', 'posts_tags.tag_id','=','tags.id')
                    ->where('posts_tags.post_id', '', $id)
                    ->get();
        return $tags;
    }
}
