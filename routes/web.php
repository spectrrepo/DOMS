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
Route::get('/test', 'ArticlesController@addPage');
Route::post('/add', 'ArticlesController@add');
Route::get('/', function(){
    return redirect("/filtr={'room':[0],'style':[0],'color':0,'sort':'0','tag':'0'}");
});
Route::get("/filtr={filtr?}", "PhotoController@index");
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

////=======================================В

///
///TODO:Новый роутинг (пока не доделан)
///

///========================================
Route::group(['middleware' => 'role:user,moderator,admin'], function () {

});
Route::group(['middleware' => 'role:0,moderator,admin'], function () {

});
Route::group(['middleware' => 'role:0,0,admin'], function () {

});

Route::group(['prefix' => '/article'], function () {
    Route::post('add','ArticlesController@add')->name('addArticle');
    Route::post('delete/{id}/','ArticlesController@delete')->name('deleteArticle')->where('name', '/^\d+$/ ');
    Route::post('edit/{id}/','ArticlesController@edit')->name('editArticle')->where('name', '/^\d+$/ ');
    Route::get('sitePage','ArticlesController@sitePage')->name('indexArticlePage');
    Route::get('editPage/{id}','ArticlesController@editPage')->name('editArticlePage')->where('name', '[A-Za-z]+');
    Route::get('addPage','ArticlesController@addPage')->name('addArticlePage');
    Route::get('listPage','ArticlesController@listPage')->name('listArticlePage');
});

Route::group(['prefix' => 'claims'], function () {
    Route::get('index', 'ClaimsController@index')->name('listClaimsPage');
    Route::post('add', 'ClaimsController@add')->name('addClaims');
    Route::post('delete/{id}', 'ClaimsController@delete')->name('deleteClaims')->where('name', '[A-Za-z]+');
    Route::post('changeAuthorship', 'ClaimsController@changeAuthorship')->name('changeClaims');
});

Route::group(['prefix' => 'colors'], function () {
    Route::post('add', 'ColorsController@add')->name('addColor');
    Route::post('edit/{id}', 'ColorsController@edit')->name('editColor')->where('name', '[A-Za-z]+');
    Route::post('delete/{id}', 'ColorsController@delete')->name('deleteColor')->where('name', '[A-Za-z]+');
    Route::get('listPage', 'ColorsController@listPage')->name('listColorPage');
    Route::get('editPage/{id}', 'ColorsController@editPage')->name('editColorPage')->where('name', '[A-Za-z]+');
    Route::get('addPage', 'ColorsController@addPage')->name('addColorPage');
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('allCommentsLoad', 'CommentsController@allCommentsLoad')->name('allCommentsLoad');
    Route::post('delete/{id}', 'CommentsController@delete')->name('deleteComment')->where('name', '[A-Za-z]+');
    Route::post('add', 'CommentsController@add')->name('addComment');
    Route::get('changeStatus/{id}', 'CommentsController@changeStatus')->name('changeStatusComment')->where('name', '[A-Za-z]+');
    Route::get('index', 'CommentsController@index')->name('listCommentsPage');
});

Route::group(['prefix' => 'favorites'], function () {
    Route::post('add', 'FavoritesController@add')->name('addFavorite');
    Route::post('delete', 'FavoritesController@delete')->name('deleteFavorite');
    Route::get('index', 'FavoritesController@index')->name('favoritePage');
});

Route::group(['prefix' => 'feedbacks'], function () {
    Route::post('add', 'FeedbacksController@add')->name('addFeedback');
    Route::get('listPage', 'FeedbacksController@listPage')->name('listFeedbackPage');
    Route::get('itemPage/{id}', 'FeedbacksController@itemPage')->name('itemFeedbackPage')->where('name', '[A-Za-z]+');
    Route::get('delete/{id}', 'FeedbacksController@delete')->name('deleteFeedback')->where('name', '[A-Za-z]+');
    Route::post('answer/{id}', 'FeedbacksController@answer')->name('answerFeedback')->where('name', '[A-Za-z]+');
});

Route::group(['prefix' => 'likes'], function () {
    Route::post('loadAllLikes', 'LikesController@loadAllLikes')->name('loadAllLikes');
    Route::post('delete', 'LikesController@delete')->name('deleteLike');
    Route::post('add', 'LikesController@add')->name('addLike');
});

Route::group(['prefix' => 'moderate_history'], function () {
    Route::get('confirmationPage', 'ModerateHistoriesController@confirmationPage')->name('asd');
    Route::get('itemConfirm/{id}', 'ModerateHistoriesController@itemConfirm')->name('asd')->where('name', '[A-Za-z]+');
    Route::get('deleteConfirm/{id}', 'ModerateHistoriesController@deleteConfirm')->name('asd')->where('name', '[A-Za-z]+');
});

Route::group(['prefix' => 'placements'], function () {
    Route::post('add', 'PlacementsController@add')->name('addPlace');
    Route::get('delete/{id}', 'PlacementsController@delete')->name('deletePlace')->where('name', '[A-Za-z]+');
    Route::post('edit/{id}', 'PlacementsController@edit')->name('editPlace')->where('name', '[A-Za-z]+');
    Route::get('listPage', 'PlacementsController@listPage')->name('listPlacePage');
    Route::get('addPage', 'PlacementsController@addPage')->name('addPlacePage');
    Route::get('editPage/{id}', 'PlacementsController@editPage')->name('editPLacePage')->where('name', '[A-Za-z]+');
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('indexPage/{json}', 'PostsController@indexPage')->name('postsGalleryPage')->where('name', '[A-Za-z]+');
    Route::get('itemPage/{id}/{json}', 'PostsController@itemPage')->name('postPage')->where('name', '[A-Za-z]+');
    Route::post('add', 'PostsController@add')->name('addPost');
    Route::post('edit/{id}', 'PostsController@edit')->name('editPost')->where('name', '[A-Za-z]+');
    Route::get('allPostSite', 'PostsController@allPostSite')->name('allPostSitePage');
    Route::get('userPost', 'PostsController@userPost')->name('userPostPage');
    Route::get('addPage', 'PostsController@addPage')->name('addPostPage');
    Route::post('loadSliderPost/{currentId}/{action}/{json}', 'PostsController@loadSliderPost')->name('loadItemPost')->where('name', '[A-Za-z]+');
    Route::post('loadGallery/{json}/{action}/{id}', 'PostsController@loadGallery')->name('loadGallery')->where('name', '[A-Za-z]+');
});

Route::group(['prefix' => 'slides'], function () {
    Route::get('index', 'SlidesController@index')->name('listSlidesPage');
    Route::post('add', 'SlidesController@add')->name('addSlide');
    Route::post('delete/{id}', 'SlidesController@delete')->name('deleteSlide')->where('name', '[A-Za-z]+');
    Route::post('edit', 'SlidesController@edit')->name('editSlide');
    Route::get('editPage/{id}', 'SlidesController@editPage')->name('editSlidePage')->where('name', '[A-Za-z]+');
    Route::get('addPage', 'SlidesController@addPage')->name('addSlidePage');
});

Route::group(['prefix' => 'social'], function () {
    Route::post('login', 'SocialController@login')->name('asd');
    Route::post('loginVK', 'SocialController@loginVK')->name('asd');
    Route::post('callback', 'SocialController@callback')->name('asd');
    Route::post('callbackVK', 'SocialController@callbackVK')->name('asd');

    Route::post('add', 'SocialController@add')->name('addSocial');
    Route::post('delete', 'SocialController@delete')->name('deleteSocial');
    Route::post('edit', 'SocialController@edit')->name('editSocial');
});
Route::group(['prefix' => 'styles'], function () {
    Route::get('delete/{id}', 'StylesController@delete')->name('deleteStyle')->where('name', '[A-Za-z]+');
    Route::post('add', 'StylesController@add')->name('addStyle');
    Route::post('edit/{id}', 'StylesController@edit')->name('editStyle')->where('name', '[A-Za-z]+');
    Route::get('listPage', 'StylesController@listPage')->name('listStylePage');
    Route::get('addPage', 'StylesController@addPage')->name('addStylePage');
    Route::get('editPage{id}', 'StylesController@editPage')->name('editStylePage')->where('name', '[A-Za-z]+');
});

Route::group(['prefix' => 'tags'], function () {
    Route::post('edit/{id}', 'TagsController@edit')->name('editTag')->where('name', '[A-Za-z]+');
    Route::get('delete/{id}', 'TagsController@delete')->name('deleteTag')->where('name', '[A-Za-z]+');
    Route::post('add', 'TagsController@add')->name('addTag');
    Route::post('indexTagsLoad', 'TagsController@indexTagsLoad')->name('indexTagsLoad');
    Route::get('editTagsPage', 'TagsController@editTagsPage')->name('edit');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('index/{id}', 'UserController@index')->name('asd')->where('name', '[A-Za-z]+');
    Route::post('ajaxLoadNews', 'UserController@ajaxLoadNews')->name('asd');
    Route::post('login', 'UserController@login')->name('asd');
    Route::get('logout', 'UserController@logout')->name('asd');
    Route::post('registration', 'UserController@registration')->name('asd');
    Route::post('recoveryAccess', 'UserController@recoveryAccess')->name('asd');
    Route::get('editPage', 'UserController@editPage')->name('asd');
    Route::get('edit', 'UserController@edit')->name('asd');
});

Route::group(['prefix' => 'views'], function () {
    Route::get('delete/{id}', 'ViewsController@delete')->name('asd')->where('name', '[A-Za-z]+');
});
