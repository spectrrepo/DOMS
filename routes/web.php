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

Route::get('/', function(){
    return redirect('/room=[0],styles=[0],colors=[0],sort=[""]');
});
Route::get('/room=[{room?}],styles=[{style?}],colors=[{color?}],sort=[{sort?}]', 'PhotoController@index');
Route::get('/photo/id=[{id}],room=[{room?}],styles=[{style?}],colors=[{color?}],sort=[{sort?}]', array('uses' => 'PhotoController@indexItem'));
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
Route::get('/profile/admin/add_news_item', array('uses' => 'UserController@addNewsItem'));
Route::get('/profile/admin/add_style_item', array('uses' => 'UserController@addStyleItem'));

Route::post('/delete_verification_image/{id}','UserController@deleteVerificationImage');
Route::post('/add_photo_site/{id}','PhotoController@addPhotoSite');

Route::post('/add_tags','TagsController@add');
Route::post('/add_styles','StylesController@add');
Route::post('/add_rooms','RoomsController@add');
Route::post('/add_news', 'NewsController@addNews');

Route::post('/edit_tag/{id}','TagsController@edit');
Route::post('/edit_style/{id}','StylesController@edit');
Route::post('/edit_room/{id}','RoomsController@edit');
Route::post('/edit_new/{id}','NewsController@edit');

Route::get('/profile/admin/edit_page_styles/{id}','StylesController@editPageIndex');
Route::get('/profile/admin/edit_page_news/{id}','NewsController@editPageIndex');

Route::post('/delete_tag/{id}','TagsController@delete');
Route::post('/delete_style/{id}','StylesController@delete');
Route::post('/delete_room/{id}','RoomsController@delete');
Route::post('/delete_news/{id}', 'NewsController@delete');

Route::post('/add_photo', 'PhotoController@add');
Route::post('/comment', 'CommentController@add');
Route::post('/like', 'LikeController@add');
Route::post('/liked', 'UserController@likedAdd');

Route::post('/delete_liked', 'UserController@likedDelete');
Route::post('/delete_like', 'LikeController@delete');

Route::post('/pagination_index', 'PhotoController@indexAddPage');
Route::post('/update/profile', 'UserController@changeYourself');

Route::post('/load_left_images', 'PhotoController@loadLeftPhoto');
Route::post('/load_right_images', 'PhotoController@loadRightPhoto');

Route::get('/logout', array('as' => 'logout',
                            'uses' => 'UserController@logout'));
Route::post('/enter', 'UserController@login');
Route::post('/reg', 'UserController@registration');
