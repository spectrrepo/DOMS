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

Route::get('/', function () {
    return view('site.index');
});
Route::get('/slider', function () {
    return view('site.slider');
});
Route::get('/profile/add', function () {
    return view('profile.add');
});
Route::get('/profile/edit', function () {
    return view('profile.edit');
});
Route::get('/profile', function () {
    return view('profile.index');
});
Route::get('/profile/liked', function () {
    return view('profile.liked');
});
