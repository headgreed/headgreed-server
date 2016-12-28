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
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/auth/facebook', 'Auth\SocialAuthController@redirect');
Route::get('/auth/facebook/callback', 'Auth\SocialAuthController@callback');

Route::get('/self_avatar', 'HomeController@avatar');

// 家
Route::get('/home', 'HomeController@index');

Route::get('/b/{slug}', 'BoardController@show');
