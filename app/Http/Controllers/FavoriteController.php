<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Picture;
use Image;
use App\Liked;

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class FavoriteController extends Controller
{
    /**
     * Login Form
     *
     * @return Re@extends('layouts.profile')
     */
    public function add()
    {
        $liked = new Liked();

        $liked->post_id = $_POST['post_id'];
        $liked->user_id = $_POST['user_id'];
        $image = Picture::find($_POST['post_id']);
        $image->favs_count += 1;
        $image->save();
        $liked->date = \Carbon\Carbon::parse();
        setlocale(LC_TIME, 'ru_RU.utf8');
        $liked->date_rus = \Carbon\Carbon::parse()->formatLocalized('%d %b %Y');
        $liked->save();
        return 'delete_liked';
    }

    public function delete()
    {
        $liked = Liked::where('post_id', '=', $_POST['post_id'])
                     ->where('user_id', '=', $_POST['user_id']);
        $image = Picture::find($_POST['post_id']);
        $image->favs_count -= 1;
        $image->save();
        $liked->delete();
        return 'liked';
    }
     /**
      * Login Form
      *
      * @return Response
      */
     public function index()
     {
         if (Auth::check()) {
             $images =  Picture::join('Likeds', 'Images.id', '=', 'Likeds.post_id')
                            ->where('Likeds.user_id', '=', Auth::id())
                            ->get();
             return view('profile.liked', ['images' => $images]);
         }
     }
}
