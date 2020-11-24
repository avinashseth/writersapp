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

Route::get('/', 'HomepageController@getHomepage')->name('get-homepage');

Route::get('author/{author_name_slug}/{author_id}', 'AuthorController@getAllBlogsByAuthor')->name('get-all-blogs-by-author');


Route::get('authors', 'HomepageController@getAllAuthors')->name('get-authors');

Route::get('follow/{author_id}', 'HomeController@getFollowAuthor')->name('get-follow-author');

Route::post('comment/{post_id}', 'CommentController@postNewComment')->name('post-comment');

Route::get('add-new-blog', 'BlogPostController@getAddNewBlog')->name('get-add-new-blog');
Route::post('add-new-blog', 'BlogPostController@postAddNewBlog')->name('post-add-new-blog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/google','Auth\LoginController@redirectToProvider')->name('get-login-with-google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::prefix('search')->group(function() {
    Route::view('blog', 'search.blog');
});


Route::prefix('blog')->group(function() {
    Route::get('edit-blog/{blog_slug}/{blog_id}', 'BlogPostController@getEditBlog')->name('get-edit-blog');
    Route::post('edit-blog/{blog_slug}/{blog_id}', 'BlogPostController@postEditBlog')->name('post-edit-blog');
    Route::get('delete-blog/{blog_slug}/{blog_id}', 'BlogPostController@getBlogDelete')->name('get-blog-delete');
    Route::get('{blog_slug}/{blog_id}', 'BlogPostController@getReadBlogByAuthor')->name('get-read-blog-by-author');
});