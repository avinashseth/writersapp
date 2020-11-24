<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    function getBlogs(Request $request) {

        $posts = Post::select('post_heading as heading', 'post_slug as slug', 'id as post_id')
            ->where('post_heading','LIKE', '%' . $request['query'] . '%')
            ->limit(5)
            ->get();

        $blogPost = [];

        foreach($posts as $post) {
            $blogPost[] = array(
                'title' => $post->heading,
                'link' => route('get-read-blog-by-author',['blog_slug'=>$post->slug,'blog_id'=>$post->post_id])
            );
        }

        return response()->json($blogPost);

    }
}
