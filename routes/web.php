<?php

// welcome page
Route::get('/', function () {
    return view('welcome');
});

// 用戶認證
Auth::routes();
Route::get('/auth/facebook', 'Auth\SocialAuthController@redirect');
Route::get('/auth/facebook/callback', 'Auth\SocialAuthController@callback');

// 家
Route::get('/home', 'HomeController@index');
