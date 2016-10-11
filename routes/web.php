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

Route::get('/', 'PhotoController@index');
Route::get('/photo/{id}', 'PhotoController@indexItem');

Route::get('/profile/{id}/add', 'UserController@index');
Route::get('/profile/{id}/edit', 'UserController@index');
Route::get('/profile/{id}', 'UserController@index');
Route::get('/profile/{id}/liked', 'UserController@index');

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
