<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomepageController extends Controller
{

    function getHomepage() {
        return view('home.welcome');
    }

    function getAllAuthors() {

        $users = User::has('post')->with('post')->paginate(10);
        return view('home.all-authors', compact('users'));

    }
}
