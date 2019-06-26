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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('/admin/posts', 'Admin\PostsController@index');
    Route::get('/admin/posts/create', 'Admin\PostsController@create');
    Route::post('/admin/posts', 'Admin\PostsController@store');
    Route::get('/admin/posts/{post}/edit', 'Admin\PostsController@edit');
    Route::patch('/admin/posts/{post}', 'Admin\PostsController@update');
    Route::delete('/admin/posts/{post}', 'Admin\PostsController@destroy');

    Route::get('/admin/categories', 'Admin\CategoriesController@index');
    Route::get('/admin/categories/create', 'Admin\CategoriesController@create');
    Route::post('/admin/categories', 'Admin\CategoriesController@store');
    Route::get('/admin/categories/{category}/edit', 'Admin\CategoriesController@edit');
    Route::patch('/admin/categories/{category}', 'Admin\CategoriesController@update');
    Route::delete('/admin/categories/{category}', 'Admin\CategoriesController@destroy');

    Route::get('/admin/users', 'Admin\UsersController@index');
    Route::get('/admin/users/create', 'Admin\UsersController@create');
    Route::post('/admin/users', 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit', 'Admin\UsersController@edit');
    Route::patch('/admin/users/{user}', 'Admin\UsersController@update');
    Route::delete('/admin/users/{user}', 'Admin\UsersController@destroy');
});


