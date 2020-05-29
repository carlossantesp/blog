<?php

use Illuminate\Support\Facades\Route;

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

//principal
Route::redirect('/','blog');

//logueo y registro
Auth::routes();

//web
Route::get('blog', 'Web\PageController@blog')->name('blog');
Route::get('entrada/{slug}', 'Web\PageController@post')->name('post');
Route::get('categorias/{slug}', 'Web\PageController@category')->name('category');
Route::get('etiquetas/{slug}', 'Web\PageController@tag')->name('tag');

//admin
Route::prefix('admin')->group(function(){
  Route::resource('tags', 'Admin\TagController');
  Route::resource('categories', 'Admin\CategoryController');
  Route::resource('posts', 'Admin\PostController');
});