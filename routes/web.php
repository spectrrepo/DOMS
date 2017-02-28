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
    return redirect('/filtr={"room":[0],"style":[0],"color":0,"sort":"0","tag":"0"}');
});
// '/search?{room:room,styles:style,colors:color,sort:sort,tag:tag}'
Route::get('/filtr={"room":[{room?}],"style":[{style?}],"color":{color?},"sort":"{sort?}","tag":"{tag?}"}', 'PhotoController@index');
Route::get('/photo/search?{"id":{id},"room":[{room}],"styles":[{style}],"colors":{color},"sort":"{sort}","tag":"{tag}"}', ['uses' => 'PhotoController@indexItem']);
Route::get('/news', ['uses' => 'NewsController@Index']);

/*login, registration and more
*/
Route::get(
    '/socialite/{provider}',
    [
        'as' => 'socialite.auth',
        function ( $provider ) {
            return \Socialize::driver( $provider )->redirect();
        }
    ]
);
Route::get('/socialite/{provider}/callback', function ($provider) {
    $newUser = new App\User();
	$user = \Socialize::driver($provider)->user();
    $newUser->name = $user->name;
    $email = 'demo@mail.com';
    $newUser->email = $email;
    $password = Hash::make('demo');
    $newUser->password = $password;
    $newUser->status = 'user';
    $newUser->phone = '0';

    Auth::attempt(['email' => 'demo@mail.com', 'password' => 'demo']);

    $newUser->save();
    Mail::send('emails.welcome', array('name' => $user->name,
                                        'e_mail' => $email,
                                        'password' => $password),
     function($message)
     {
       $message->to('skiffy166@gmail.com', 'Георгий')
       ->subject('Вы зарегистрировались на сайте www.doms.design');
     });

    return redirect('/');
});
Route::get('/logout',['as' => 'logout', 'uses' => 'UserController@logout']);
Route::get('/social_login/{provider}', 'SocialController@login');
Route::get('/social_login/callback/{provider}', 'SocialController@callback');
Route::post('/enter', 'UserController@login');
Route::post('/reg', 'UserController@registration');
Route::post('/recovery_pass', 'UserController@recoveryAccess' );
/*only view all users
*/
Route::get('/profile/{id}', ['uses' => 'UserController@index']);
/*callback all people
*/
Route::post('/send_mail', ['as' => 'sendMail', 'uses' => 'MessagesController@sendMail']);

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
Route::post('/load_sort_photo_slider', 'PhotoController@loadSortPhotoSlider');
Route::post('/load_tags_mask', 'TagsController@indexTagsMask' );
Route::post('/load_all_likes', 'SliderController@loadAllLikes');
/*
/ These routes , which users have access
*/
Route::group(['middleware' => 'role:user,moderator,admin'], function () {
    /*View user pages
    */
    Route::get('/profile/admin/verification/{id}', ['uses' => 'UserController@confirmationItemPage']);
    Route::get('/profile/add/photo', ['as' => 'add', 'uses' => 'UserController@indexAdd']);
    Route::get('/profile/edit/user', ['as' => 'edit', 'uses' => 'UserController@editUser']);
    Route::get('/profile/liked/photo', ['as' => 'liked', 'uses' => 'FavoriteController@index']);
    Route::get('/profile/{id}/your_photo', ['uses' => 'UserController@yourPhotoUpload']);

    Route::post('/delete_liked', 'FavoriteController@delete');
    Route::post('/delete_like', 'LikeController@delete');
    Route::post('/pagination_news', 'UserController@ajaxDownloadUpdate');
    Route::post('/update/profile', 'UserController@changeYourself');
    Route::post('/add_photo_site/{id}','PhotoController@addPhotoSite');
    Route::post('/add_links', 'SocialController@add');
    Route::post('/add_photo', 'PhotoController@add');
    Route::post('/comment', 'CommentController@add');
    Route::post('/like', 'LikeController@add');
    Route::post('/liked', 'FavoriteController@add');
    Route::post('/edit_links','SocialController@edit');
    Route::post('/pagination_index', 'PhotoController@indexAddPage');

});

/*
/ These routes , which moderators have access
*/

Route::group(['middleware' => 'role:0,moderator,admin'], function () {

    Route::get('/profile/admin/comments', ['as' => 'comments','uses' => 'CommentController@index']);
    Route::get('/profile/admin/verification', ['as' => 'verified', 'uses' => 'UserController@confirmationsPage']);
    Route::get('/profile/admin/add_news', ['as' => 'news', 'uses' => 'UserController@addNewsPage']);
    Route::get('/profile/admin/add_news_item', ['uses' => 'UserController@addNewsItem']);
    Route::get('/profile/admin/messages', ['as' => 'messages','uses' => 'MessagesController@mailIndex']);
    Route::get('/profile/admin/copyrights', ['as' => 'copyright', 'uses' => 'CopyrightController@index']);
    Route::get('/profile/admin/edit_page_news/{id}','NewsController@editPageIndex');
    Route::get('/profile/admin/edit_copyrights', ['as' => 'pretense', 'uses' => 'CopyrightController@index']);
    Route::get('/profile/admin/photo/all', 'PhotoController@allPhotoSite');
    Route::get('/profile/admin/answer_mail/{id}', 'MessagesController@mailIndexItem');
    Route::post('/read_new_comment', 'CommentController@changeStatus');
    Route::post('/add_news', 'NewsController@addNews');
    Route::post('/answer_mail', 'MessagesController@askOnMail');
    Route::post('/delete_copyright', 'CopyrightController@delete');
    Route::post('/delete_comments/{id}', 'CommentController@delete');
    Route::post('/delete_message/{id}', 'MessagesController@deleteMail');
    Route::post('/edit_new/{id}','NewsController@edit');
    Route::post('/save_copyright', 'CopyrightController@saveNewCopyright');
    Route::post('/add_copyright', 'CopyrightController@add');

});

/*
/ These routes , which admins have access
*/
Route::group(['middleware' => 'role:0,0,admin'], function () {
    Route::get('/profile/admin/edit_page_styles/{id}','StylesController@editPageIndex');
    Route::get('/profile/admin/tags_edit', ['as' => 'tags_edit', 'uses' => 'UserController@editTagsPage']);
    Route::get('/profile/admin/styles_edit', ['as' => 'styles_edit', 'uses' => 'UserController@editStylesPage']);
    Route::get('/profile/admin/rooms_edit', ['as' => 'rooms_edit', 'uses' => 'UserController@editRoomsPage']);
    Route::get('/profile/admin/add_style_item', ['uses' => 'UserController@addStyleItem']);
    Route::get('/profile/admin/slides', ['as' => 'slide', 'uses' => 'ChangeSlideController@index']);

    Route::post('/edit_slide', 'ChangeSlideController@change');
    Route::post('/edit_tag/{id}','TagsController@edit');
    Route::post('/edit_style/{id}','StylesController@edit');
    Route::post('/edit_room/{id}','RoomsController@edit');

    Route::post('/add_slide', 'ChangeSlideController@add');
    Route::post('/add_tags','TagsController@add');
    Route::post('/add_rooms','RoomsController@add');
    Route::post('/add_styles','StylesController@add');

    Route::post('/delete_links', 'SocialController@delete');

});
