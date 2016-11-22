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

Route::get('/', function(){
    return redirect('/room=[0],styles=[0],colors=[0],sort=[""]');
});
Route::get('/room=[{room?}],styles=[{style?}],colors=[{color?}],sort=[{sort?}]', 'PhotoController@index');
Route::get('/photo/{id}', array('uses' => 'PhotoController@indexItem'));
Route::get('/profile/{id}', array('uses' => 'UserController@index'));
Route::get('/news', array('uses' => 'NewsController@Index'));

Route::get('/profile/add/photo', array('as' => 'add',
                                       'uses' => 'UserController@indexAdd'));
Route::get('/profile/edit/user', array('as' => 'edit',
                                       'uses' => 'UserController@editUser'));
Route::get('/profile/liked/photo', array('as' => 'liked',
                                         'uses' => 'UserController@likedIndex'));
Route::get('/profile/{id}/your_photo', array('uses' => 'UserController@yourPhotoUpload'));

Route::get('/profile/admin/verification', array('as' => 'verified',
                                                'uses' => 'UserController@confirmationsPage'));
Route::get('/profile/admin/tags_edit', array('as' => 'tags_edit',
                                             'uses' => 'UserController@editTagsPage'));
Route::get('/profile/admin/styles_edit', array('as' => 'styles_edit',
                                               'uses' => 'UserController@editStylesPage'));
Route::get('/profile/admin/rooms_edit', array('as' => 'rooms_edit',
                                              'uses' => 'UserController@editRoomsPage'));
Route::get('/profile/admin/add_news', array('as' => 'news',
                                            'uses' => 'UserController@addNewsPage'));
Route::get('/profile/admin/verification/{id}', array('uses' => 'UserController@confirmationItemPage'));

Route::post('/add_news', 'NewsController@addNews');
Route::post('/add_photo', 'PhotoController@add');
Route::post('/comment', 'CommentController@add');
Route::post('/like', 'LikeController@add');

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
