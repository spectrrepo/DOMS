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
Route::get('/gallery/{id}/rule={json}', 'PostsController@itemPage')->name('postPage');

Route::post('login', 'UserController@login')
    ->name('login');
Route::post('registration', 'UserController@registration')
    ->name('registration');

Route::group(['prefix' => '/articles'], function () {
    Route::get('/','ArticlesController@sitePage')->name('indexArticlePage');

    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::post('add','ArticlesController@add')->name('addArticle');
        Route::get('delete/{id}/','ArticlesController@delete')->name('deleteArticle');
        Route::post('edit/{id}/','ArticlesController@edit')->name('editArticle');
        Route::get('editPage/{id}','ArticlesController@editPage')->name('editArticlePage');
        Route::get('addPage','ArticlesController@addPage')->name('addArticlePage');
        Route::get('listPage','ArticlesController@listPage')->name('listArticlePage');
    });
});

Route::group(['prefix' => 'claims'], function () {
    Route::post('add', 'ClaimsController@add')->name('addClaims')
         ->middleware('role:user, moderator, admin');

    Route::group(['middleware' => 'role:0,moderator,admin'], function (){
        Route::get('index', 'ClaimsController@index')->name('listClaimsPage');
        Route::get('delete/{id}', 'ClaimsController@delete')->name('deleteClaims');
        Route::get('changeAuthorship/{id}', 'ClaimsController@changeAuthorship')->name('changeClaims');
    });
});

Route::group(['prefix' => 'colors', 'middleware' => 'role:user,moderator,admin'], function () {
    Route::post('add', 'ColorsController@add')->name('addColor');
    Route::post('edit/{id}', 'ColorsController@edit')->name('editColor')
         ->where('id', '/^\d+$/');
    Route::get('delete/{id}', 'ColorsController@delete')->name('deleteColor');
    Route::get('listPage', 'ColorsController@listPage')->name('listColorPage');
    Route::get('editPage/{id}', 'ColorsController@editPage')->name('editColorPage');
    Route::get('addPage', 'ColorsController@addPage')->name('addColorPage');
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('allCommentsLoad', 'CommentsController@allCommentsLoad')->name('allCommentsLoad');

    Route::group(['middleware' => 'role:user,moderator,admin'], function () {
        Route::get('delete/{id}', 'CommentsController@delete')->name('deleteComment');
        Route::post('add', 'CommentsController@add')->name('addComment');
    });

    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::get('changeStatus/{id}', 'CommentsController@changeStatus')
             ->name('changeStatusComment');
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
        Route::get('itemPage/{id}', 'FeedbacksController@itemPage')->name('itemFeedbackPage')
             ->where('id', '/^\d+$/');
        Route::get('delete/{id}', 'FeedbacksController@delete')->name('deleteFeedback');
        Route::post('answer/{id}', 'FeedbacksController@answer')->name('answerFeedback');
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
         ->name('deletePlace');
    Route::post('edit/{id}', 'PlacementsController@edit')
         ->name('editPlace');
    Route::get('listPage', 'PlacementsController@listPage')
         ->name('listPlacePage');
    Route::get('addPage', 'PlacementsController@addPage')
         ->name('addPlacePage');
    Route::get('editPage/{id}', 'PlacementsController@editPage')
         ->name('editPLacePage');
});

Route::group(['prefix' => 'posts'], function () {
    Route::post('loadSliderPost/{currentId}/{action}/{json}', 'PostsController@loadSliderPost')
         ->name('loadItemPost')
         ->where('currentId', '/^\d+$/')
         ->where('action', '[A-Za-z]+')
         ->where('json', '[A-Za-z]+');
    Route::post('loadGallery/{json}/{action}/{id}', 'PostsController@loadGallery')
         ->name('loadGallery')
         ->where('currentId', '/^\d+$/')
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
        Route::post('edit/{id}', 'PostsController@edit')->name('editPost');
        Route::get('userPosts/{id}', 'PostsController@userPosts')->name('userPostsPage');
        Route::get('editPage/{id}','PostsController@editPage')->name('editPostPage');
        Route::get('deletePost/{id}', 'PostsController@deleteVerificationPost')
            ->name('deleteVerPost');
    });
    
    Route::get('allPostSite', 'PostsController@allPostSite')->name('allPostSitePage')
         ->middleware('role:0,moderator,admin');
});

Route::group(['prefix' => 'slides', 'middleware' => 'role:0,0,admin'], function () {
    Route::get('index', 'SlidesController@index')->name('listSlidesPage');
    Route::get('editPage/{id}', 'SlidesController@editPage')->name('editSlidePage');
    Route::get('addPage', 'SlidesController@addPage')->name('addSlidePage');
    Route::post('add', 'SlidesController@add')->name('addSlide');
    Route::get('delete/{id}', 'SlidesController@delete')->name('deleteSlide');
    Route::post('edit/{id}', 'SlidesController@edit')->name('editSlide');
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
         ->name('deleteStyle');
    Route::post('add', 'StylesController@add')
         ->name('addStyle');
    Route::post('edit/{id}', 'StylesController@edit')
         ->name('editStyle');
    Route::get('listPage', 'StylesController@listPage')->name('listStylePage');
    Route::get('addPage', 'StylesController@addPage')
         ->name('addStylePage');
    Route::get('editPage/{id}', 'StylesController@editPage')
         ->name('editStylePage');
});

Route::group(['prefix' => 'tags'], function () {
    Route::group(['middleware' => 'role:0,moderator,admin'], function () {
        Route::post('edit/{id}', 'TagsController@edit')
             ->name('editTag');
        Route::get('delete/{id}', 'TagsController@delete')
             ->name('deleteTag');
        Route::get('editTagsPage/{id}', 'TagsController@editPage')
             ->name('editTagPage');
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
         ->where('id', '/^\d+$/');
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
    Route::get('/edit/{id}', 'RolesController@editPage')->name('editRolesPage');
    Route::post('/edit/{id}', 'RolesController@edit')->name('editRole');
});

Route::get('delete/{id}', 'ViewsController@delete')
     ->name('deleteViews')
     ->where('id', '/^\d+$/')
     ->middleware('role:user,moderator,admin');
