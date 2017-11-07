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
Route::get('/login', 'Admin\AdminController@login')->name('login');
Route::post('/login', 'Admin\AdminController@loginIn');
Route::get('/logout', 'Admin\AdminController@logout')->name('logout');
Route::get('/register', 'Admin\AdminController@register')->name('register');
Route::get('login/captcha', 'Admin\AdminController@loginCaptchaAction')->name('captcha');

//全部视频
Route::get('/allVideos', 'Video\VideoController@getVideoLists')->name('allVideos');

//文章教程

//我的文章
Route::get('/myArticle', 'Article\ArticleController@getArticleLists')->name('myArticle');
Route::get('/myArticle/add', 'Article\ArticleController@articleAdd')->name('myArticle-add');
Route::post('/myArticle/add', 'Article\ArticleController@postArticleAdd')->name('myArticle-add-post');
Route::get('/myArticle/edit', 'Article\ArticleController@articleEdit')->name('myArticle-edit');
Route::post('/myArticle/edit/{id}', 'Article\ArticleController@postArticleEdit')->name('myArticle-edit-post');
Route::post('/myArticle/delete/{id}', 'Article\ArticleController@articleDelete')->name('myArticle-delete');
