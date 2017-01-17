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
    return redirect('/room=[0],styles=[0],colors=[0],sort=[0],tag=[0]');
});
Route::get('/room=[{room?}],styles=[{style?}],colors=[{color?}],sort=[{sort?}],tag=[{tag?}]', 'PhotoController@index');
Route::get('/photo/id=[{id}],room=[{room?}],styles=[{style?}],colors=[{color?}],sort=[{sort?}],tag=[{tag?}]', array('uses' => 'PhotoController@indexItem'));
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
Route::get('/profile/admin/comments', array('as' => 'comments',
                                            'uses' => 'CommentController@index'));
Route::get('/profile/admin/messages', array('as' => 'messages',
                                            'uses' => 'MessagesController@mailIndex'));
Route::get('/profile/admin/copyrights', array('as' => 'copyright',
                                            'uses' => 'CopyrightController@index'));
Route::get('/profile/admin/slides', array('as' => 'slide',
                                            'uses' => 'ChangeSlideController@index'));
Route::get('/profile/admin/answer_mail/{id}', 'MessagesController@mailIndexItem');

Route::post('/delete_copyright/{id}', 'CopyrightController@delete');
Route::post('/delete_comments/{id}', 'CommentController@delete');
Route::post('/delete_message/{id}', 'MessagesController@deleteMail');
Route::post('/delete_slide/{id}', 'ChangeSlideController@delete');

Route::post('/save_copyright/{id}', 'CopyrightController@delete');
Route::post('/add_slide/{id}', 'ChangeSlideController@delete');


Route::post('/edit_slide/{id}', 'ChangeSlideController@delete');
Route::post('/answer_mail', 'MessagesController@askOnMail');
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
Route::post('/send_mail',array('as' => 'sendMail',
                               'uses' => 'MessagesController@sendMail'));

Route::get('/profile/admin/edit_page_styles/{id}','StylesController@editPageIndex');
Route::get('/profile/admin/edit_page_news/{id}','NewsController@editPageIndex');

Route::post('/delete_tag/{id}','TagsController@delete');
Route::post('/delete_style/{id}','StylesController@delete');
Route::post('/delete_room/{id}','RoomsController@delete');
Route::post('/delete_news/{id}', 'NewsController@delete');
Route::post('/delete_comment', 'CommentController@delete');
Route::post('/delete_view', 'PhotoController@deleteView');

Route::post('/add_photo', 'PhotoController@add');
Route::post('/comment', 'CommentController@add');
Route::post('/like', 'LikeController@add');
Route::post('/liked', 'UserController@likedAdd');

Route::post('/delete_liked', 'UserController@likedDelete');
Route::post('/delete_like', 'LikeController@delete');

Route::post('/pagination_index', 'PhotoController@indexAddPage');
Route::post('/pagination_news', 'PhotoController@indexAddPage');
Route::post('/update/profile', 'UserController@changeYourself');


Route::post('/load_slides', 'SliderController@dwnldPhotoSlider');
Route::post('/load_views', 'SliderController@dwnldViewsForPhoto');
Route::post('/load_tags', 'SliderController@dwnldTags');
Route::post('/load_comments', 'SliderController@dwnldComments');
Route::post('/load_like', 'SliderController@dwnldLikeWhom');
Route::post('/load_info_slide', 'SliderController@dwnldInfoPhoto');
Route::post('/load_user', 'SliderController@dwnldPhotoUser');
Route::post('/load_zoom_photo', 'SliderController@loadZoomPhoto');

Route::post('/load_active_like', 'SliderController@loadActiveLike');
Route::post('/load_active_favorite', 'SliderController@loadActiveLiked');


Route::post('/load_sort_photo', 'PhotoController@loadSortPhoto');

Route::get('/logout', array('as' => 'logout',
                            'uses' => 'UserController@logout'));
Route::post('/enter', 'UserController@login');
Route::post('/reg', 'UserController@registration');
