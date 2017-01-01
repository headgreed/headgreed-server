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
Route::get('/user', function (Request $request) {
    // return Auth::guard('api')->getTokenForRequest();
    return $request->user();
})->middleware('auth:api');
