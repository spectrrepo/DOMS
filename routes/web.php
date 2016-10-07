<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('site.index');
});
Route::get('/slider', function () {
    return view('site.slider');
});
Route::get('/profile/add', function () {
    return view('profile.add');
});
Route::get('/profile/edit', function () {
    return view('profile.edit');
});
Route::get('/profile', function () {
    return view('profile.index');
});
Route::get('/profile/liked', function () {
    return view('profile.liked');
});

// TODO: read more about "Auth" class and him methods
Route::group(array('before' => 'un_auth'), function()
{
    // TODO: add my controller
    Route::get('/profile/add', array('as' = 'add_photo'));
    Route::get('/profile/edit', array('as' = 'edit_profile'));
    Route::get('/profile', array('as' = 'profile_main_page'));
    Route::get('/profile/liked', array('as' = 'liked_user'));
});

// TODO: change this filter and add new filte with Redirect::to('login');
Route::filter('un_auth', function()
{
        if (!Auth::guest()){
            Auth::logout();
        }
});
// TODO: add route for different ststus_profile
