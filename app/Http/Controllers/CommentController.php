<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    function postNewComment(Request $request) {

        $commentDetails = $request->validate([
            'comment' => 'required|max:255|min:3'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id; // future it will Auth::user()->id
        $comment->comment = $request->comment;
        $comment->save();

        $request->session()->flash('comment_feedback', 'Comment added successfully!');
        $request->session()->flash('comment_feedback_class', 'alert alert-success');

        return redirect()->back();

    }
}
