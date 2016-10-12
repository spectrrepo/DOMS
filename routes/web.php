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

Route::get('/', array('as' => 'index',
                      'uses' => 'PhotoController@index'));
Route::get('/photo/{id}', array('uses' => 'PhotoController@indexItem'));
Route::get('/profile/{id}', array('uses' => 'UserController@index'));

Route::get('/profile/add', array('uses' => 'UserController@indexAdd'));
Route::get('/profile/edit', array('uses' => 'UserController@indexAdd'));
Route::get('/profile/liked', array('uses' => 'UserController@indexAdd'));


Route::post('/add_photo', 'PhotoController@add');
Route::post('/comment', 'CommentController@add');
Route::get('/like', 'LikeController@add');
// TODO:restfull controler add





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




Route::get('/tags');
Route::get('/style');
Route::get('/colors');
Route::get('/sort');
