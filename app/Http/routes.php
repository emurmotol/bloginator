<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::pattern('debug_id', '[0-9]+');
Route::get('dd/{debug_id}', 'DebugController@dd');

//Route::auth();

Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'AuthController@showLoginForm');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');

    // Registration Routes...
    Route::get('register', 'AuthController@showRegistrationForm');
    Route::post('register', 'AuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'PasswordController@showResetForm');
    Route::post('password/email', 'PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'PasswordController@reset');
});

Route::group(['namespace' => 'Home'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@home');
    Route::get('donate', 'HomeController@donate');
    Route::get('blog', 'HomeController@blog');
    Route::get('faq', 'HomeController@faq');
    Route::get('help', 'HomeController@help');
    Route::get('about', 'HomeController@about');
});

Route::group(['namespace' => 'Dashboard'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin/{username}'], function () {
        Route::group(['middleware' => ['auth', 'admin']], function () {
            Route::get('/', [
                'as' => 'admin',
                'uses' => 'DashboardController@index'
            ]);
            Route::get('dashboard', [
                'as' => 'admin.dashboard',
                'uses' => 'DashboardController@showAdminDashboard'
            ]);
            Route::resource('user', 'UserController');
        });
        Route::resource('post', 'PostController');
        Route::resource('post.comment', 'CommentController');
    });


    Route::group(['namespace' => 'Basic', 'prefix' => 'basic/{username}'], function () {
        Route::group(['middleware' => ['auth', 'basic']], function () {
            Route::get('/', [
                'as' => 'basic',
                'uses' => 'DashboardController@index'
            ]);
            Route::get('dashboard', [
                'as' => 'basic.dashboard',
                'uses' => 'DashboardController@showBasicDashboard'
            ]);
        });
        Route::resource('post', 'PostController');
        Route::resource('post.comment', 'CommentController');
    });


    Route::group(['namespace' => 'Premium', 'prefix' => 'premium/{username}'], function () {
        Route::group(['middleware' => ['auth', 'premium']], function () {
            Route::get('/', [
                'as' => 'premium',
                'uses' => 'DashboardController@index'
            ]);
            Route::get('dashboard', [
                'as' => 'premium.dashboard',
                'uses' => 'DashboardController@showPremiumDashboard'
            ]);
        });
        Route::resource('post', 'PostController');
        Route::resource('post.comment', 'CommentController');
    });
});