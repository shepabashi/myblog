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
Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

Route::get('/home', 'HomeController@index');

/* Media Routing */
Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'MediaController@index')->name('media.index');
    Route::get('upload', 'MediaController@showUploadForm')->name('media.upload');
    Route::post('upload', 'MediaController@upload');
});

/* Config Routing */
Route::group(['prefix' => 'control-panel', 'middleware' => 'auth'], function () {
    Route::get('/', 'ControlPanel@index')->name('control-panel.root');

    /* Post Edit Routing */
    Route::get('posts', 'PostController@index')->name('post.index');
    Route::resource('post', 'PostController', ['except' => ['index', 'show']]);

    /* Category Edit Routing */
    Route::get('categories', 'CategoryController@index')->name('category.index');
    Route::resource('category', 'CategoryController', ['except' => ['index', 'show']]);
});

/* Index Routing */
Route::get('/', 'HomeController@index')->name('index');

/* Category Routing*/
Route::get('/category/{category}', 'CategoryController@show')->name('category.show');

/* Post Single Page Routing */
Route::get('/{post}', 'PostController@show')->name('post.show');
