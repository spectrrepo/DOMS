<?php

namespace App\Http\ Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Placement;
use App\Models\Style;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Color;
use App\Models\View;

class ModerateHistoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addNewsPage()
    {
        $news = Article::all();
        return view('moderator.add_news', ['news' => $news]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editRoomsPage()
    {
        $rooms = Placement::paginate(10);
        return view('moderator.edit_rooms', ['rooms' => $rooms]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editStylesPage()
    {
        $styles = Style::paginate(10);
        return view('moderator.edit_styles', ['styles' => $styles]);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmationsPage()
    {
        $images = Post::where('verified', '=', false)->paginate(10);
        return view('moderator.wait_confirmation', ['images' => $images]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function confirmationItemPage($id)
    {
        $imageId = Post::find($id);
        $needUser = User::find($imageId->author_id);
        if ((Auth::user()->status === 'moderator' ) || (Auth::user()->id === $needUser->id)) {
            $user = User::find( Auth::id() );
            $styles = Style::all();
            $rooms = Placement::all();
            $colors = Color::all();
            $tags = Tag::where('post_id', '=', $id)->get();
            $tagAll = '';
            foreach ($tags as $tag) {
                $tagAll .= $tag->title.';';
            }
            $views = View::where('post_id', '=', $id)->get();
            $image = Post::find($id);

            return view('moderator.wait_confirmation_item', ['user' => $user,
                'styles' => $styles,
                'tags' => $tags,
                'views' => $views,
                'rooms' => $rooms,
                'tagAll' => $tagAll,
                'colors' => $colors,
                'image' => $image]);

        }else {
            return redirect('/profile/'.Auth::user()->id);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addNewsItem()
    {
        return view('moderator.news');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addStyleItem()
    {
        return view('moderator.style');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteVerificationImage($id)
    {
        $image = Post::find($id)->delete();
        if ( Auth::user()->status == 'moderator') {
            return redirect('/profile/admin/verification');
        }else {
            return redirect('/profile/'.Auth::user()->id)->with('check', 'delete');
        }
    }

}
