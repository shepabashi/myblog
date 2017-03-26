<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/post', 'PostController', ['except'=>'show']);

Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'MediaController@index')->name('media.index');
    Route::get('upload', 'MediaController@showUploadForm')->name('media.upload');
    Route::post('upload', 'MediaController@upload');
});

Route::group(['prefix' => 'config'], function () {
    Route::get('/', 'ConfigController@index');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/{post}', 'PostController@show')->name('post.show');
