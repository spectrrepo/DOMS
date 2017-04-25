<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Placement;
use App\Models\Style;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Color;
use App\Models\View;

class AdminController extends Controller
{
    public function addNewsPage()
    {
        $news = Article::all();
        return view('moderator.add_news', ['news' => $news]);
    }

    public function editRoomsPage()
    {
        $rooms = Placement::paginate(10);
        return view('moderator.edit_rooms', ['rooms' => $rooms]);
    }

    public function editStylesPage()
    {
        $styles = Style::paginate(10);
        return view('moderator.edit_styles', ['styles' => $styles]);
    }

    public function editTagsPage()
    {
        $tags = Tag::paginate(10);
        return view('moderator.edit_tags', ['tags' => $tags]);
    }

    public function confirmationsPage()
    {
        $images = Post::where('verified', '=', false)->paginate(10);
        return view('moderator.wait_confirmation', ['images' => $images]);
    }

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

    public function addNewsItem()
    {
        return view('moderator.news');
    }

    public function addStyleItem()
    {
        return view('moderator.style');
    }

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
