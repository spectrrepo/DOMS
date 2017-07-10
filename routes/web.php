<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function(){
   return redirect(url('/rule={"color":0,"placements":[0],"style":[0],"tag":"0"}'));
});
Route::get('/rule={json}', 'PostsController@indexPage')->name('postsGalleryPage');
Route::get('/gallery/{id}/rule={json}', 'PostsController@itemPage')
     ->name('postPage')
     ->where('id', '[0-9]');

Route::post('login', 'UserController@login')
     ->name('login');
Route::post('registration', 'UserController@registration')
     ->name('registration');

Route::group(['prefix' => '/articles'], function () {
    Route::get('/','ArticlesController@sitePage')->name('indexArticlePage');

    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::post('add','ArticlesController@add')->name('addArticle');
        Route::get('delete/{id}/','ArticlesController@delete')
             ->name('deleteArticle')
             ->where('id', '[0-9]');
        Route::post('edit/{id}/','ArticlesController@edit')
             ->name('editArticle')
             ->where('id', '[0-9]');
        Route::get('editPage/{id}','ArticlesController@editPage')
             ->name('editArticlePage')
             ->where('id', '[0-9]');
        Route::get('addPage','ArticlesController@addPage')->name('addArticlePage');
        Route::get('listPage','ArticlesController@listPage')->name('listArticlePage');
    });
});

Route::group(['prefix' => 'claims'], function () {
    Route::post('add', 'ClaimsController@add')->name('addClaims')
         ->middleware('role:user, moderator, admin');

    Route::group(['middleware' => 'role:0,moderator,admin'], function (){
        Route::get('index', 'ClaimsController@index')->name('listClaimsPage');
        Route::get('delete/{id}', 'ClaimsController@delete')
             ->name('deleteClaims')
             ->where('id', '[0-9]');
        Route::get('changeAuthorship/{id}', 'ClaimsController@changeAuthorship')->name('changeClaims');
    });
});

Route::group(['prefix' => 'colors', 'middleware' => 'role:user,moderator,admin'], function () {
    Route::post('add', 'ColorsController@add')->name('addColor');
    Route::post('edit/{id}', 'ColorsController@edit')
         ->name('editColor')
         ->where('id', '[0-9]');
    Route::get('delete/{id}', 'ColorsController@delete')
         ->name('deleteColor')
         ->where('id', '[0-9]');
    Route::get('listPage', 'ColorsController@listPage')->name('listColorPage');
    Route::get('editPage/{id}', 'ColorsController@editPage')
         ->name('editColorPage')
         ->where('id', '[0-9]');
    Route::get('addPage', 'ColorsController@addPage')->name('addColorPage');
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('allCommentsLoad', 'CommentsController@allCommentsLoad')->name('allCommentsLoad');

    Route::group(['middleware' => 'role:user,moderator,admin'], function () {
        Route::get('delete/{id}', 'CommentsController@delete')
             ->name('deleteComment')
             ->where('id', '[0-9]');
        Route::post('add', 'CommentsController@add')->name('addComment');
    });

    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::get('changeStatus/{id}', 'CommentsController@changeStatus')
             ->name('changeStatusComment')
             ->where('id', '[0-9]');
        Route::get('index', 'CommentsController@index')->name('listCommentsPage');
    });
});

Route::group(['prefix' => 'favorites', 'middleware' => 'role:user,moderator,admin'], function () {
    Route::post('add', 'FavoritesController@add')->name('addFavorite');
    Route::post('delete', 'FavoritesController@delete')->name('deleteFavorite');
    Route::get('index', 'FavoritesController@index')->name('favoritePage');
});

Route::group(['prefix' => 'feedbacks'], function () {
    Route::post('add', 'FeedbacksController@add')->name('addFeedback');

    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::get('listPage', 'FeedbacksController@listPage')->name('listFeedbackPage');
        Route::get('itemPage/{id}', 'FeedbacksController@itemPage')
             ->name('itemFeedbackPage')
             ->where('id', '[0-9]');
        Route::get('delete/{id}', 'FeedbacksController@delete')
             ->name('deleteFeedback')
             ->where('id', '[0-9]');
        Route::post('answer/{id}', 'FeedbacksController@answer')
             ->name('answerFeedback')
             ->where('id', '[0-9]');
    });
});

Route::group(['prefix' => 'likes'], function () {
    Route::post('loadAllLikes', 'LikesController@loadAllLikes')->name('loadAllLikes');

    Route::group(['middleware' => 'role:user,moderator,admin'], function () {
        Route::post('delete', 'LikesController@delete')->name('deleteLike');
        Route::post('add', 'LikesController@add')->name('addLike');
    });
});

Route::group(['prefix' => 'placements', 'middleware' => 'role:0,0,admin'], function () {
    Route::post('add', 'PlacementsController@add')
         ->name('addPlace');
    Route::get('delete/{id}', 'PlacementsController@delete')
         ->name('deletePlace')
         ->where('id', '[0-9]');
    Route::post('edit/{id}', 'PlacementsController@edit')
         ->name('editPlace')
         ->where('id', '[0-9]');
    Route::get('listPage', 'PlacementsController@listPage')
         ->name('listPlacePage');
    Route::get('addPage', 'PlacementsController@addPage')
         ->name('addPlacePage');
    Route::get('editPage/{id}', 'PlacementsController@editPage')
         ->name('editPLacePage')
         ->where('id', '[0-9]');
});

Route::group(['prefix' => 'posts'], function () {
    Route::post('loadSliderPost/{currentId}/{action}/{json}', 'PostsController@loadSliderPost')
         ->name('loadItemPost')
         ->where('id', '[0-9]')
         ->where('action', '[A-Za-z]+')
         ->where('json', '[A-Za-z]+');
    Route::post('loadGallery/{json}/{action}/{id}', 'PostsController@loadGallery')
         ->name('loadGallery')
         ->where('id', '[0-9]')
         ->where('action', '[A-Za-z]+')
         ->where('json', '[A-Za-z]+');

    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::get('confirmationList', 'PostsController@confirmationsPage')
             ->name('confirmList');
        Route::get('addPostSite/{id}', 'PostsController@addPostSite')
             ->name('addPostSite');
    });

    Route::group(['middleware' => 'role:user,moderator,admin'], function () {
        Route::post('add', 'PostsController@add')->name('addPost');
        Route::get('addPage', 'PostsController@addPage')->name('addPostPage');
        Route::post('edit/{id}', 'PostsController@edit')
             ->name('editPost')
             ->where('id', '[0-9]');
        Route::get('userPosts/{id}', 'PostsController@userPosts')
             ->name('userPostsPage')
             ->where('id', '[0-9]');
        Route::get('editPage/{id}','PostsController@editPage')
             ->name('editPostPage')
             ->where('id', '[0-9]');
        Route::get('deletePost/{id}', 'PostsController@deleteVerificationPost')
             ->name('deleteVerPost')
             ->where('id', '[0-9]');
    });
    
    Route::get('allPostSite', 'PostsController@allPostSite')
         ->name('allPostSitePage')
         ->middleware('role:0,moderator,admin');
});

Route::group(['prefix' => 'slides', 'middleware' => 'role:0,0,admin'], function () {
    Route::get('index', 'SlidesController@index')
         ->name('listSlidesPage');
    Route::get('editPage/{id}', 'SlidesController@editPage')
         ->name('editSlidePage')
         ->where('id', '[0-9]');
    Route::get('addPage', 'SlidesController@addPage')->name('addSlidePage');
    Route::post('add', 'SlidesController@add')->name('addSlide');
    Route::get('delete/{id}', 'SlidesController@delete')
         ->name('deleteSlide')
         ->where('id', '[0-9]');
    Route::post('edit/{id}', 'SlidesController@edit')
         ->name('editSlide')
         ->where('id', '[0-9]');
});

Route::group(['prefix' => 'social'], function () {
    Route::post('login', 'SocialController@login')->name('loginFB');
    Route::post('loginVK', 'SocialController@loginVK')->name('loginVK');
    Route::post('callback', 'SocialController@callback')->name('callbackFB');
    Route::post('callbackVK', 'SocialController@callbackVK')->name('callbackVK');
    
    Route::group(['middleware' => 'role:user,moderator,admin'], function () {
        Route::post('add', 'SocialController@add')->name('addSocial');
        Route::post('delete', 'SocialController@delete')->name('deleteSocial');
        Route::post('edit', 'SocialController@edit')->name('editSocial');
    });
});
Route::group(['prefix' => 'styles', 'middleware' => 'role:0,0,admin'], function () {
    Route::get('delete/{id}', 'StylesController@delete')
         ->name('deleteStyle')
         ->where('id', '[0-9]');
    Route::post('add', 'StylesController@add')
         ->name('addStyle');
    Route::post('edit/{id}', 'StylesController@edit')
         ->name('editStyle')
         ->where('id', '[0-9]');
    Route::get('listPage', 'StylesController@listPage')->name('listStylePage');
    Route::get('addPage', 'StylesController@addPage')
         ->name('addStylePage');
    Route::get('editPage/{id}', 'StylesController@editPage')
         ->name('editStylePage')
         ->where('id', '[0-9]');
});

Route::group(['prefix' => 'tags'], function () {
    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::post('edit/{id}', 'TagsController@edit')
             ->name('editTag')
             ->where('id', '[0-9]');
        Route::get('delete/{id}', 'TagsController@delete')
             ->name('deleteTag')
             ->where('id', '[0-9]');
        Route::get('editTagsPage/{id}', 'TagsController@editPage')
             ->name('editTagPage')
             ->where('id', '[0-9]');
        Route::get('listTagsPage', 'TagsController@listPage')
             ->name('listTagPage');
        Route::get('addTagsPage', 'TagsController@addPage')
             ->name('addTagPage');
    });

    Route::post('add', 'TagsController@add')
         ->name('addTag')
         ->middleware('role:user,moderator,admin');

    Route::post('indexTagsLoad', 'TagsController@indexTagsLoad')
         ->name('indexTagsLoad');
});

Route::group(['prefix' => '/user'], function () {
    Route::get('{id}', 'UserController@index')
         ->name('userPage')
         ->where('id', '[0-9]');
    Route::post('recoveryAccess', 'UserController@recoveryAccess')
         ->name('recoveryAccess');

    Route::group(['middleware' => 'role:user,moderator,admin'], function () {
        Route::post('ajaxLoadNews', 'UserController@ajaxLoadNews')
             ->name('loadNews');
        Route::get('logout', 'UserController@logout')
             ->name('logout');
        Route::get('editPage', 'UserController@editPage')
             ->name('editUserPage');
        Route::post('edit', 'UserController@edit')
             ->name('editUser');
    });
});


Route::group(['prefix' => '/roles', 'middleware' => 'role:0,0,admin'], function () {
    Route::get('/list', 'RolesController@listPage')->name('listRolesPage');
    Route::get('/edit/{id}', 'RolesController@editPage')
         ->name('editRolesPage')
         ->where('id', '[0-9]');
    Route::post('/edit/{id}', 'RolesController@edit')
         ->name('editRole')
         ->where('id', '[0-9]');
});

Route::get('delete/{id}', 'ViewsController@delete')
     ->name('deleteViews')
     ->where('id', '[0-9]')
     ->middleware('role:user,moderator,admin');
