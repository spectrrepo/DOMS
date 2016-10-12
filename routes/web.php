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

Route::get('/', array('as' => 'index',
                      'uses' => 'PhotoController@index'));
Route::get('/photo/{id}', array('uses' => 'PhotoController@indexItem'));

Route::get('/profile/{id}/add', array('uses' => 'UserController@indexAdd'));
Route::get('/profile/{id}/edit', array('uses' => 'UserController@index'));
Route::get('/profile/{id}', array('uses' => 'UserController@index'));
Route::get('/profile/{id}/liked', array('uses' => 'UserController@index'));


Route::post('/add_photo', 'PhotoController@add');
Route::post('/comment', 'CommentController@add');
Route::get('/like', 'LikeController@add');
// TODO:restfull controler add

Route::get('/tags');
Route::get('/style');
Route::get('/colors');
Route::get('/sort');

// // TODO: read more about "Auth" class and him methods
// Route::group(array('before' => 'un_auth'), function()
// {
//     // TODO: add my controller
//     Route::get('/profile/add', array('as' = 'add_photo'));
//     Route::get('/profile/edit', array('as' = 'edit_profile'));
//     Route::get('/profile', array('as' = 'profile_main_page'));
//     Route::get('/profile/liked', array('as' = 'liked_user'));
// });
//
// // TODO: change this filter and add new filte with Redirect::to('login');
// Route::filter('un_auth', function()
// {
//         if (!Auth::guest()){
//             Auth::logout();
//         }
// });
// TODO: add route for different ststus_profile
