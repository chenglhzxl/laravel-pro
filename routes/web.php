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

Route::get('/about', 'Page\PageController@getAbout')->name('about');
Route::get('/', 'Admin\AdminController@index')->name('index');
Route::get('/article', 'Article\ArticleController@getArticleLists')->name('article');
Route::get('/article/add', 'Article\ArticleController@articleAdd')->name('article-add');
Route::post('/article/add', 'Article\ArticleController@postArticleAdd')->name('article-add-post');
Route::get('/article/edit', 'Article\ArticleController@articleEdit')->name('article-edit');
Route::post('/article/edit/{id}', 'Article\ArticleController@postArticleEdit')->name('article-edit-post');
Route::post('/article/delete/{id}', 'Article\ArticleController@articleDelete')->name('article-delete');
