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

Route::get('blog/{blog_slug}/{blog_id}', 'BlogPostController@getReadBlogByAuthor')->name('get-read-blog-by-author');

Route::get('authors', 'HomepageController@getAllAuthors')->name('get-authors');

Route::post('comment/{post_id}', 'CommentController@postNewComment')->name('post-comment');

Route::get('login', function() {
    echo "to create login function";
});

Route::get('add-new-blog', 'BlogPostController@getAddNewBlog')->name('get-add-new-blog');
Route::post('add-new-blog', 'BlogPostController@postAddNewBlog')->name('post-add-new-blog');
