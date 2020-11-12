<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogPostController extends Controller
{
    function getReadBlogByAuthor(Request $request) {

        $post = Post::where('id', $request->blog_id)->with('comments')->first();

        return view('home.blog', compact('post'));

    }
}
