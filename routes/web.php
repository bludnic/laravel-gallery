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

use Illuminate\Http\Request;

Auth::routes();

Route::middleware(['auth', 'auth.admin'])->group(function () {
  Route::get('/admin', 'Admin\DashboardController@index');

  // Admin\CategoryController
  Route::get('/admin/categories', 'Admin\CategoryController@index');
  Route::get('/admin/categories/new', 'Admin\CategoryController@new');
  Route::get('/admin/categories/edit/{id}', 'Admin\CategoryController@edit');
  Route::post('/admin/categories/create', 'Admin\CategoryController@create');
  Route::post('/admin/categories/update/{id}', 'Admin\CategoryController@update');
  Route::get('/admin/categories/delete/{id}', 'Admin\CategoryController@delete');

  // Admin\ImageController
  Route::get('/admin/images', 'Admin\ImageController@index');
  Route::get('/admin/images/new', 'Admin\ImageController@new');
  Route::get('/admin/images/edit/{id}', 'Admin\ImageController@edit');
  Route::post('/admin/images/create', 'Admin\ImageController@create');
  Route::post('/admin/images/update/{id}', 'Admin\ImageController@update');
  Route::get('/admin/images/delete/{id}', 'Admin\ImageController@delete');

  // Admin\CommentController
  Route::get('/admin/comments', 'Admin\CommentController@index');
  Route::get('/admin/comments/new', 'Admin\CommentController@new');
  Route::get('/admin/comments/edit/{id}', 'Admin\CommentController@edit');
  Route::post('/admin/comments/create', 'Admin\CommentController@create');
  Route::post('/admin/comments/update/{id}', 'Admin\CommentController@update');
  Route::get('/admin/comments/delete/{id}', 'Admin\CommentController@delete');

  // Admin\UserController
  Route::get('/admin/users', 'Admin\UserController@index');
  Route::get('/admin/users/new', 'Admin\UserController@new');
  Route::get('/admin/users/edit/{id}', 'Admin\UserController@edit');
  Route::post('/admin/users/create', 'Admin\UserController@create');
  Route::post('/admin/users/update/{id}', 'Admin\UserController@update');
  Route::get('/admin/users/delete/{id}', 'Admin\UserController@delete');
});

// ImageController
Route::get('/', 'ImageController@index');
Route::get('/image/upload', 'ImageController@renderImageForm');
Route::get('/image/{id}', 'ImageController@renderImagePage');
Route::get('/images/my', 'ImageController@renderMyImagesPage')->name('my-images');
Route::get('/images/category/{id}', 'ImageController@renderImagesByCategoryPage');
Route::post('/image/create', 'ImageController@create');
Route::post('/image/update/{id}', 'ImageController@update');
Route::get('/image/delete/{id}', 'ImageController@delete');

// CommentController
Route::post('/comment/{id}', 'CommentController@create');
Route::get('/comment/delete/{id}', 'CommentController@delete');

// PageController
Route::get('/pages/disabled', 'PageController@disabled');
