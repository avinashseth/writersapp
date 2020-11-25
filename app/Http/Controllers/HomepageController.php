<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

class HomepageController extends Controller
{

    function getHomepage() {

        $post = Post::select('post_heading','post_body','post_slug','id')->orderBy('created_at','desc')->limit(1)->first();

        return view('home.welcome', compact('post'));
    }

    function getAllAuthors() {

        $users = User::has('post')->with('post')->paginate(10);
        return view('home.all-authors', compact('users'));

    }

    function getAllBlogs() {

        $posts = Post::select('post_heading','post_body','post_slug','id')
            ->orderBy('created_at','desc')
            ->paginate(25);

        return view('home.all-blogs', compact('posts'));

    }
}
