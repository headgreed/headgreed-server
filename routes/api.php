<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/TokenGuard.php
// Route::get('/user', function (Request $request) {
//     // return Auth::guard('api')->getTokenForRequest();
//     return $request->user();
// })->middleware('auth:api');

Route::group(['middleware' => 'apitoken'], function () {

    // 測試區
    Route::get('/test', function () {
        return 'GET /test 成功';
    });
    Route::post('/test', function (Request $request) {
        return 'POST /test 成功';
    });
    Route::post('/testname', function (Request $request) {
        return 'POST /testname ' . $request->name;
    });

    Route::post('facebook', 'Auth\SocialAuthController@facebook');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', 'UserController@user');
    Route::get('u/posts', 'UserController@posts');
    Route::patch('user', 'UserController@update');

    Route::get('boards', 'BoardController@index');
    Route::get('board/{slug}', 'BoardController@getBoard');

    Route::get('p/{slug}', 'PostController@index');
    Route::post('p/{slug}', 'PostController@store');
});


// 雜
Route::get('random', function ()
{
    return md5(uniqid(rand(), TRUE));
});
