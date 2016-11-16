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
//TODO: 3 category user in filter for profile pages
// TODO: read more about "Auth" class and him methods
// TODO: change this filter and add new filte with Redirect::to('login');
// TODO: add route for different ststus_profile

Route::get('/{color?}', 'PhotoController@index');
Route::get('/photo/{id}', array('uses' => 'PhotoController@indexItem'));
Route::get('/profile/{id}', array('uses' => 'UserController@index'));

Route::get('/profile/add/photo', array('as' => 'add',
                                       'uses' => 'UserController@indexAdd'));
Route::get('/profile/edit/user', array('as' => 'edit',
                                       'uses' => 'UserController@editUser'));
Route::get('/profile/liked/photo', array('as' => 'liked',
                                         'uses' => 'UserController@likedIndex'));

Route::get('/profile/{id}/your_photo', array('uses' => 'UserController@yourPhotoUpload'));
Route::post('/add_photo', 'PhotoController@add');
Route::post('/comment', 'CommentController@add');
Route::post('/like', 'LikeController@add');
// TODO:restfull controler add

Route::post('/pagination_index', 'PhotoController@indexAddPage');
Route::post('/liked', 'UserController@likedAdd');
Route::post('/update/profile', 'UserController@changeYourself');

Route::post('/load_left_images', 'PhotoController@loadLeftPhoto');
Route::post('/load_right_images', 'PhotoController@loadRightPhoto');
// ------------------- TEST router ------------------>
Route::get('/login', function()
{
    return view('login');
});
Route::get('/register', function(){
    return view('registration');
});
Route::get('/logout', array('as' => 'logout',
                            'uses' => 'UserController@logout'));
Route::post('/enter', 'UserController@login');
Route::post('/reg', 'UserController@registration');
// ---------------- END TEST router ---------------->
