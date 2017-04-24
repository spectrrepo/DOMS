<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Room;
use App\Style;
use App\Tag;
use App\Picture;
use App\User;
use App\Color;
use App\View;

class AdminController extends Controller
{
    public function addNewsPage()
    {
        $news = Article::all();
        return view('moderator.add_news', ['news' => $news]);
    }

    public function editRoomsPage()
    {
        $rooms = Room::paginate(10);
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
        $images = Picture::where('verified', '=', false)->paginate(10);
        return view('moderator.wait_confirmation', ['images' => $images]);
    }

    public function confirmationItemPage($id)
    {
        $imageId = Picture::find($id);
        $needUser = User::find($imageId->author_id);
        if ((Auth::user()->status === 'moderator' ) || (Auth::user()->id === $needUser->id)) {
            $user = User::find( Auth::id() );
            $styles = Style::all();
            $rooms = Room::all();
            $colors = Color::all();
            $tags = Tag::where('post_id', '=', $id)->get();
            $tagAll = '';
            foreach ($tags as $tag) {
                 $tagAll .= $tag->title.';';
            }
            $views = View::where('post_id', '=', $id)->get();
            $image = Picture::find($id);

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
        $image = Picture::find($id)->delete();
        if ( Auth::user()->status == 'moderator') {
            return redirect('/profile/admin/verification');
        }else {
            return redirect('/profile/'.Auth::user()->id)->with('check', 'delete');
        }
    }
    
}
