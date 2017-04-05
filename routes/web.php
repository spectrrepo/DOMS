<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
/ These routes , which guests have access
*/
Route::get('/', function(){
    return redirect("/filtr={'room':[0],'style':[0],'color':0,'sort':'0','tag':'0'}");
});
Route::get("/filtr={'room':[{room?}],'style':[{style?}],'color':{color?},'sort':'{sort?}','tag':'{tag?}'}", "PhotoController@index");
Route::get("/photo/id={id}&filtr={'room':[{room?}],'styles':[{style?}],'colors':{color?},'sort':'{sort?}','tag':'{tag?}'}", "PhotoController@indexItem");
Route::get('/news', ['uses' => 'NewsController@Index']);

/*
login, registration and more
*/
Route::group(['prefix' => '/socialite'], function () {
    Route::get('/{provider}', 'as' => 'socialite.auth', 'SocialController@callbackVK');
    Route::get('/{provider}/callback', 'SocialController@callbackVK');
});

Route::group('/social_login', function () {
    Route::get('/{provider}', 'SocialController@login');
    Route::get('/callback/{provider}', 'SocialController@callback');
});

Route::get('/logout',['as' => 'logout', 'uses' => 'UserController@logout']);
Route::post('/enter', 'UserController@login');
Route::post('/reg', 'UserController@registration');
Route::post('/recovery_pass', 'UserController@recoveryAccess' );
/*
only view all users
*/
Route::get('/profile/{id}', ['uses' => 'UserController@index']);
/*
callback all people
*/
Route::post('/send_mail', ['as' => 'sendMail', 'uses' => 'MessagesController@sendMail']);
Route::group(['load'], function () {
    Route::post('/slides', 'SliderController@dwnldPhotoSlider');
    Route::post('/views', 'SliderController@dwnldViewsForPhoto');
    Route::post('/tags', 'SliderController@dwnldTags');
    Route::post('/comments', 'SliderController@dwnldComments');
    Route::post('/like', 'SliderController@dwnldLikeWhom');
    Route::post('/info_slide', 'SliderController@dwnldInfoPhoto');
    Route::post('/user', 'SliderController@dwnldPhotoUser');
    Route::post('/zoom_photo', 'SliderController@loadZoomPhoto');
    Route::post('/active_like', 'SliderController@loadActiveLike');
    Route::post('/active_favorite', 'SliderController@loadActiveLiked');
    Route::post('/sort_photo', 'PhotoController@loadSortPhoto');
    Route::post('/sort_photo_slider', 'PhotoController@loadSortPhotoSlider');
    Route::post('/tags_mask', 'TagsController@indexTagsMask' );
    Route::post('/all_likes', 'SliderController@loadAllLikes');
});
/*
/ These routes , which users have access
*/
Route::group(['middleware' => 'role:user,moderator,admin'], function () {
    /*
    View user pages
    */
    Route::group('/profile', function () {
        Route::get('/admin/verification/{id}', ['uses' => 'UserController@confirmationItemPage']);
        Route::get('/add/photo', ['as' => 'add', 'uses' => 'UserController@indexAdd']);
        Route::get('/edit/user', ['as' => 'edit', 'uses' => 'UserController@editUser']);
        Route::get('/liked/photo', ['as' => 'liked', 'uses' => 'FavoriteController@index']);
        Route::get('/{id}/your_photo', ['uses' => 'UserController@yourPhotoUpload']);
        Route::post('/update', 'UserController@changeYourself');
    });

    Route::group('delete', function () {
        Route::post('/liked', 'FavoriteController@delete');
        Route::post('/like', 'LikeController@delete');
    });

    Route::group('add', function () {
        Route::post('/photo_site/{id}','PhotoController@addPhotoSite');
        Route::post('/links', 'SocialController@add');
        Route::post('/photo', 'PhotoController@add');
    });

    Route::group('/pagination', function () {
        Route::post('/news', 'UserController@ajaxDownloadUpdate');
        Route::post('/index', 'PhotoController@indexAddPage');
    });

    Route::post('/comment', 'CommentController@add');
    Route::post('/like', 'LikeController@add');
    Route::post('/liked', 'FavoriteController@add');
    Route::post('/edit_links','SocialController@edit');

});

/*
 These routes , which moderators have access
*/

Route::group(['middleware' => 'role:0,moderator,admin'], function () {

    Route::group('/profile/admin', function () {
        Route::get('/comments', ['as' => 'comments','uses' => 'CommentController@index']);
        Route::get('/verification', ['as' => 'verified', 'uses' => 'UserController@confirmationsPage']);
        Route::get('/add_news', ['as' => 'news', 'uses' => 'UserController@addNewsPage']);
        Route::get('/add_news_item', ['uses' => 'UserController@addNewsItem']);
        Route::get('/messages', ['as' => 'messages','uses' => 'MessagesController@mailIndex']);
        Route::get('/copyrights', ['as' => 'copyright', 'uses' => 'CopyrightController@index']);
        Route::get('/edit_page_news/{id}','NewsController@editPageIndex');
        Route::get('/edit_copyrights', ['as' => 'pretense', 'uses' => 'CopyrightController@index']);
        Route::get('/photo/all', 'PhotoController@allPhotoSite');
        Route::get('/answer_mail/{id}', 'MessagesController@mailIndexItem');
    });

    Route::group('delete', function () {
        Route::post('/copyright', 'CopyrightController@delete');
        Route::post('/comments/{id}', 'CommentController@delete');
        Route::post('/message/{id}', 'MessagesController@deleteMail');
    });

    Route::post('/read_new_comment', 'CommentController@changeStatus');
    Route::post('/add_news', 'NewsController@addNews');
    Route::post('/answer_mail', 'MessagesController@askOnMail');
    Route::post('/edit_new/{id}','NewsController@edit');
    Route::post('/add_copyright', 'CopyrightController@add');
    Route::post('/save_copyright', 'CopyrightController@saveNewCopyright');

});

/*
These routes , which admins have access
*/
Route::group(['middleware' => 'role:0,0,admin'], function () {

    Route::group(['/profile/admin'], function () {
        Route::get('/edit_page_styles/{id}','StylesController@editPageIndex');
        Route::get('/tags_edit', ['as' => 'tags_edit', 'uses' => 'UserController@editTagsPage']);
        Route::get('/styles_edit', ['as' => 'styles_edit', 'uses' => 'UserController@editStylesPage']);
        Route::get('/rooms_edit', ['as' => 'rooms_edit', 'uses' => 'UserController@editRoomsPage']);
        Route::get('/add_style_item', ['uses' => 'UserController@addStyleItem']);
        Route::get('/slides', ['as' => 'slide', 'uses' => 'ChangeSlideController@index']);
    });

    Route::group(['edit'], function () {
        Route::post('/slide', 'ChangeSlideController@change');
        Route::post('/tag/{id}','TagsController@edit');
        Route::post('/style/{id}','StylesController@edit');
        Route::post('/room/{id}','RoomsController@edit');
    });

    Route::gtoup(['add'], function () {
        Route::post('/slide', 'ChangeSlideController@add');
        Route::post('/tags','TagsController@add');
        Route::post('/rooms','RoomsController@add');
        Route::post('/styles','StylesController@add');
    });

    Route::post('/delete/links', 'SocialController@delete');

});
