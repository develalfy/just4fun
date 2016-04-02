<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'media'], function () {
        Route::get('/', ['as' => 'media.get_list', 'uses' => 'AdminController@getListMedia']);
        Route::get('add', ['as' => 'media.get_add', 'uses' => 'AdminController@getAddMedia']);
        Route::post('add', ['as' => 'media.post_add', 'uses' => 'AdminController@postAddMedia']);
        Route::get('delete/{id}', ['as' => 'media.delete', 'uses' => 'AdminController@deleteMedia']);
        Route::get('json/{type}', ['as' => 'json.ads', 'uses' => 'AdminController@getAdsJson']);
        Route::get('extract', ['as' => 'extract.url', 'uses' => 'AdminController@getVideoData']);
    });

    Route::group(['prefix' => 'seo'], function () {
        Route::get('/', ['as' => 'seo.get_add', 'uses' => 'AdminController@getSeo']);
        Route::post('/', ['as' => 'seo.post_add', 'uses' => 'AdminController@postSeo']);
    });

    Route::group(['prefix' => 'ads'], function () {
        Route::get('/', ['as' => 'ads.get_add', 'uses' => 'AdminController@getAds']);
        Route::post('/', ['as' => 'ads.post_add', 'uses' => 'AdminController@postAds']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users.get_list', 'uses' => 'AdminController@getUsers']);
        Route::get('add', ['as' => 'users.get_add', 'uses' => 'AdminController@getAddUser']);
        Route::post('add', ['as' => 'users.post_add', 'uses' => 'AdminController@postAddUser']);
        Route::get('delete/{id}', ['as' => 'users.delete', 'uses' => 'AdminController@deleteUser']);
    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/{type}', ['as' => 'home.type', 'uses' => 'HomeController@singlePage']);
    Route::get('home/{id}', ['as' => 'home.view_media', 'uses' => 'HomeController@viewMedia']);
});