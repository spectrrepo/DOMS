<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|These routes , which guests have access
|--------------------------------------------------------------------------
*/
Route::get('/test', 'ArticlesController@index');
Route::post('/add', 'ArticlesController@add');
Route::get('/', function(){
    return redirect("/filtr={'room':[0],'style':[0],'color':0,'sort':'0','tag':'0'}");
});
Route::get("/filtr={'room':[{room?}],'style':[{style?}],'color':{color?},'sort':'{sort?}','tag':'{tag?}'}", "PhotoController@index");
Route::get("/photo/id={id}&filtr={'room':[{room?}],'styles':[{style?}],'colors':{color?},'sort':'{sort?}','tag':'{tag?}'}", "PhotoController@indexItem");
Route::get('/news', 'NewsController@Index');

/*
|login, registration and more
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/socialite'], function () {
    Route::get('/{provider}', 'SocialController@callbackVK')->name('socialite.auth');
    Route::get('/{provider}/callback', 'SocialController@callbackVK');
});

Route::group(['prefix' => '/social_login'], function () {
    Route::get('/{provider}', 'SocialController@login');
    Route::get('/callback/{provider}', 'SocialController@callback');
});

Route::get('/logout','UserController@logout')->name('logout');
Route::post('/enter', 'UserController@login');
Route::post('/reg', 'UserController@registration');
Route::post('/recovery_pass', 'UserController@recoveryAccess' );
/*
|only view all users
|--------------------------------------------------------------------------
*/
Route::get('/profile/{id}', 'UserController@index');
/*
|callback all people
|--------------------------------------------------------------------------
*/
Route::post('/send_mail', 'MessagesController@sendMail')->name('sendMail');
Route::group(['prefix' => 'load'], function () {
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
| These routes , which users have access
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'role:user,moderator,admin'], function () {
    /*
    View user pages
    */
    Route::group(['prefix' => '/profile'], function () {
        Route::get('/admin/verification/{id}', 'UserController@confirmationItemPage');
        Route::get('/add/photo', 'UserController@indexAdd')->name('add');
        Route::get('/edit/user', 'UserController@editUser')->name('edit');
        Route::get('/liked/photo', 'FavoriteController@index')->name('liked');
        Route::get('/{id}/your_photo', 'UserController@yourPhotoUpload');
        Route::post('/update', 'UserController@changeYourself');
    });

    Route::group(['prefix' => 'delete'], function () {
        Route::post('/liked', 'FavoriteController@delete');
        Route::post('/like', 'LikeController@delete');
    });

    Route::group(['prefix' => 'add'], function () {
        Route::post('/photo_site/{id}','PhotoController@addPhotoSite');
        Route::post('/links', 'SocialController@add');
        Route::post('/photo', 'PhotoController@add');
    });

    Route::group(['prefix' => '/pagination'], function () {
        Route::post('/news', 'UserController@ajaxDownloadUpdate');
        Route::post('/index', 'PhotoController@indexAddPage');
    });

    Route::post('/comment', 'CommentController@add');
    Route::post('/like', 'LikeController@add');
    Route::post('/liked', 'FavoriteController@add');
    Route::post('/edit_links','SocialController@edit');

});

/*
|These routes , which moderators have access
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'role:0,moderator,admin'], function () {

    Route::group(['prefix' => '/profile/admin'], function () {
        Route::get('/comments', 'CommentController@index')->name('comments');
        Route::get('/verification', 'UserController@confirmationsPage')->name('verified');
        Route::get('/add_news', 'UserController@addNewsPage')->name('news');
        Route::get('/add_news_item', 'UserController@addNewsItem');
        Route::get('/messages', 'MessagesController@mailIndex')->name('messages');
        Route::get('/copyrights', 'CopyrightController@index')->name('copyright');
        Route::get('/edit_page_news/{id}','NewsController@editPageIndex');
        Route::get('/edit_copyrights', 'CopyrightController@index')->name('pretense');
        Route::get('/photo/all', 'PhotoController@allPhotoSite');
        Route::get('/answer_mail/{id}', 'MessagesController@mailIndexItem');
    });

    Route::group(['prefix' => 'delete'], function () {
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
|These routes , which admins have access
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'role:0,0,admin'], function () {

    Route::group(['prefix' => '/profile/admin'], function () {
        Route::get('/edit_page_styles/{id}','StylesController@editPageIndex');
        Route::get('/tags_edit', 'UserController@editTagsPage')->name('tags_edit');
        Route::get('/styles_edit', 'UserController@editStylesPage')->name('styles_edit');
        Route::get('/rooms_edit', 'UserController@editRoomsPage')->name('rooms_edit');
        Route::get('/add_style_item', 'UserController@addStyleItem');
        Route::get('/slides', 'ChangeSlideController@index')->name('slide');
    });

    Route::group(['prefix' => '/edit'], function () {
        Route::post('/slide', 'ChangeSlideController@change');
        Route::post('/tag/{id}','TagsController@edit');
        Route::post('/style/{id}','StylesController@edit');
        Route::post('/room/{id}','RoomsController@edit');
    });

    Route::group(['prefix' => '/add'], function () {
        Route::post('/slide', 'ChangeSlideController@add');
        Route::post('/tags','TagsController@add');
        Route::post('/rooms','RoomsController@add');
        Route::post('/styles','StylesController@add');
    });

    Route::post('/delete/links', 'SocialController@delete');

});
