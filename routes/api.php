<?php

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

Route::post('auth', 'Auth\AuthController@authenticate');

Route::group(['middleware' => ['active:1', 'jwt.auth']], function () {
    Route::get('user', 'Auth\AuthController@getAuthenticatedUser');
});
