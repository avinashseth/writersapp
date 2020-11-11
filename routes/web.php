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
