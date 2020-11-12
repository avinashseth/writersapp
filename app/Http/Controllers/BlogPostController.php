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

    function getAddNewBlog() {

        return view('home.write-blog');

    }

    function postAddNewBlog(Request $request) {

        $blogData = $request->validate([
            'blog_heading'  => 'required|max:300|min:10',
            'blog_body' => 'required|min:10|max:5000',
        ]);

        $post = new Post;
        $post->post_body = $request->blog_body;
        $post->post_heading = $request->blog_heading;
        $post->post_slug = $request->blog_heading;
        $post->user_id = rand(1,100); // it will be Auth::user()->id
        $post->save();

        $request->session()->flash('blog_feedback', 'Blog added successfully!');
        $request->session()->flash('blog_feedback_class', 'alert alert-success');

        return redirect()->back();

    }
}
