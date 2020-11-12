<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthorController extends Controller
{
    function getAllBlogsByAuthor($author_name_slug, $user_id) {

        $user = User::where('id', $user_id)->with('post')->first();

        return view('home.all-author-blogs', compact('user'));

    }
}
