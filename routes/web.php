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
Route::group(['middleware' => ['theme:saas,frontend']], function () {
    Auth::routes();
});
Route::group(
  [
    'middleware' => [
      'active',
      'auth',
        //'subscription',
    ],
  ], function () {
    Route::group(
      [
        'middleware' => [
            //'subscription',
          'theme:' . config('app.themes.admin.name') . ',' . config('app.themes.admin.layout'),
        ],
      ], function () {
        Route::get('dashboard', 'HomeController@index');
    });
    // Administrator, Trainer and Facilitator only
    Route::group(['middleware' => ['role:administrator']], function () {
        Route::resource('users', 'UsersController');
        Route::resource('packages', 'PackageController');
    });
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('subscribe/{id}', 'PackageController@subscribe')->name('packages.subscribe');
    Route::get('unsubscribed', 'PackageController@unsubscribed')->name('packages.unsubscribed');
    Route::get('expired', 'PackageController@expired')->name('packages.expired');
});
// Handle Socialite Redirection & Callback
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
