<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class BlogPostController extends Controller
{

    function __construct() {

        $this->middleware('auth')->except('getReadBlogByAuthor');

    }

    function getBlogDelete(Request $request) {

        if(is_null($request->blog_id) || !is_numeric($request->blog_id)) {

            $request->session()->flash('blog_feedback_message', 'Invalid Blog Id, please try again!');
            $request->session()->flash('blog_feedback_class', 'alert alert-danger');
            return redirect('/home');

        }
        if(is_null($request->blog_slug)) {
            $request->session()->flash('blog_feedback_message', 'Invalid Blog Slug, please try again!');
            $request->session()->flash('blog_feedback_class', 'alert alert-danger');
            return redirect('/home');
        }

        Post::where('id', $request->blog_id)
            ->delete();
        $request->session()->flash('blog_feedback_message', 'Blog Deleted Successfully!');
        $request->session()->flash('blog_feedback_class', 'alert alert-success');
        return redirect('/home');
    }

    function postCommentOnBlog() {

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id; // future it will Auth::user()->id
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json(['status'=>true,'message'=>'Comment posted successfully']);
        
    }

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
        $post->user_id = Auth::user()->id;
        $post->save();

        $request->session()->flash('blog_feedback', 'Blog added successfully!');
        $request->session()->flash('blog_feedback_class', 'alert alert-success');

        return redirect()->back();

    }

    function getEditBlog(Request $request) {

        if(is_null($request->blog_id) || !is_numeric($request->blog_id)) {

            $request->session()->flash('blog_feedback_message', 'Invalid Blog Id, please try again!');
            $request->session()->flash('blog_feedback_class', 'alert alert-danger');
            return redirect('/home');

        }
        if(is_null($request->blog_slug)) {
            $request->session()->flash('blog_feedback_message', 'Invalid Blog Slug, please try again!');
            $request->session()->flash('blog_feedback_class', 'alert alert-danger');
            return redirect('/home');
        }

        $post = Post::where('id', $request->blog_id)->first();

        return view('home.edit-blog', compact('post'));

    }

    function postEditBlog(Request $request) {

        $blogData = $request->validate([
            'blog_heading'  => 'required|max:300|min:10',
            'blog_body' => 'required|min:10|max:5000',
        ]);

        Post::where('id', $request->blog_id)
            ->update(
                [
                    'post_heading'=>$request->blog_heading,
                    'post_body'=>$request->blog_body,
                ]
            );

        $request->session()->flash('blog_feedback', 'Blog Updated successfully!');
        $request->session()->flash('blog_feedback_class', 'alert alert-success');

        return redirect()->route('get-edit-blog',['blog_id'=>$request->blog_id, 'blog_slug'=>$request->blog_slug]);
    }
}
