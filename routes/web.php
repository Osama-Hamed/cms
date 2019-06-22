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

Route::get('/', 'PostsController@index');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{category}', 'PostsController@index');
Route::get('/posts/{category}/{post}', 'PostsController@show');

Route::post('/posts/{category}/{post}/comments', 'CommentsController@store');

Auth::routes(['register' => false]);

Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');

Route::get('/admin/posts', 'Admin\PostsController@index');
Route::get('/admin/posts/create', 'Admin\PostsController@create');
Route::post('/admin/posts', 'Admin\PostsController@store');
Route::get('/admin/posts/{post}/edit', 'Admin\PostsController@edit');
Route::patch('/admin/posts/{post}', 'Admin\PostsController@update');
