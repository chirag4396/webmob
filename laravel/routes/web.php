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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::group(['middleware' => 'user'], function() {
	Route::get('/blogs', 'HomeController@index')->name('home');
	Route::post('/get-blogs', 'BlogController@getBlogs')->name('get-blogs');
	Route::resource('blog', 'BlogController');
	Route::resource('category', 'CategoryController');
});