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
Auth::routes(['verify' => false, 'confirm' => false, 'email'=>false, 'reset'=>false]);

//web
Route::get('blog', 'Web\PageController')->name('blog');
Route::get('entrada/{slug}', 'Web\PagePostController')->name('post');
Route::get('categorias/{category}', 'Web\PageCategoriesController')->name('category');
Route::get('etiquetas/{tag}', 'Web\PageTagsController')->name('tag');

//admin
Route::prefix('admin')->middleware('auth')->group(function(){
  Route::resource('tags', 'Admin\TagController');
  Route::resource('categories', 'Admin\CategoryController');
  Route::resource('posts', 'Admin\PostController');
});
