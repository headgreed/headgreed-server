<?php

// welcome page
Route::get('/', function () {
    if (!\Auth::guest()) {
        return redirect('/home');
    }
    return view('welcome');
});

// 用戶認證
// Auth::routes();
// vendor/laravel/framework/src/Illuminate/Routing/Router.php
Route::get('/auth/facebook', 'Auth\SocialAuthController@redirect');
Route::get('/auth/facebook/callback', 'Auth\SocialAuthController@callback');

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // 家
    Route::get('/home', 'HomeController@index');
    Route::get('/self_avatar', 'HomeController@avatar');
    Route::get('photo/{file}', 'UserController@photo');
    Route::get('profile', 'UserController@profile');

    Route::get('/b/{slug}', 'BoardController@show');
    // Route::get('/p/{slug}', 'PostController@show');
});
