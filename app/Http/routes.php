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
    Route::get('media', ['as' => 'media.get_list', 'uses' => 'AdminController@getListMedia']);
    Route::get('media/add', ['as' => 'media.get_add', 'uses' => 'AdminController@getAddMedia']);
    Route::post('media/add', ['as' => 'media.post_add', 'uses' => 'AdminController@postAddMedia']);
    Route::get('media/delete/{id}', ['as' => 'media.delete', 'uses' => 'AdminController@deleteMedia']);
    Route::get('seo', ['as' => 'seo.get_add', 'uses' => 'AdminController@getSeo']);
    Route::post('seo', ['as' => 'seo.post_add', 'uses' => 'AdminController@postSeo']);
    Route::get('ads', ['as' => 'ads.get_add', 'uses' => 'AdminController@getAds']);
    Route::post('ads', ['as' => 'ads.post_add', 'uses' => 'AdminController@postAds']);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});