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
// theme configuration can be use app.themes.default for default while app.themes.admin for admin
Route::group(['middleware' => 'theme:saas,frontend'], function () {
    Route::get('/', function (Request $request) {
        return view('welcome');
    });

    Route::get('/account/activate/{token}', 'AccountController@activate');
});

Route::group(['middleware' => ['theme:default,blank']], function () {
    Auth::routes();
});

Route::group(
    [
        'middleware' => [
            'active',
            'auth',
            'theme:' . config('app.themes.admin.name') . ',' . config('app.themes.admin.layout'),
        ],
    ], function () {
        Route::get('dashboard', 'HomeController@index');

        // Administrator, Trainer and Facilitator only
        Route::group(['middleware' => ['role:administrator|trainer|facilitator']], function () {
            Route::resource('users', 'UsersController');
        });
    });

// Handle Socialite Redirection & Callback
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
