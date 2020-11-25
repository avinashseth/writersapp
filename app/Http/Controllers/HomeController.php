<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Follower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getFollowAuthor(Request $request) {

        if(is_null($request->author_id) || !is_numeric($request->author_id)) {

            $request->session()->flash('blog_feedback', 'Invalid Author ID!');
            $request->session()->flash('blog_feedback_class', 'alert alert-danger');

            return redirect()->back();

        }

        $follow = Follower::where(['author_id'=>$request->author_id,'follower_id'=>Auth::user()->id])
            ->count();
        
        if($follow == 0) {

            $follower = new Follower();
            $follower->author_id = $request->author_id;
            $follower->follower_id = Auth::user()->id;
            $follower->save();

            $request->session()->flash('follow_feedback', 'You are now following!');
            $request->session()->flash('follow_feedback_class', 'alert alert-success');
            
            return redirect()->back();

        } else {

            $request->session()->flash('follow_feedback', 'You are already following!');
            $request->session()->flash('follow_feedback_class', 'alert alert-danger');
            return redirect()->back();

        }

    }

    function getUnfollowAuthor(Request $request) {

        if(is_null($request->author_id) || !is_numeric($request->author_id)) {

            $request->session()->flash('follow_feedback', 'Invalid Author ID!');
            $request->session()->flash('follow_feedback_class', 'alert alert-danger');

            return redirect()->back();

        }

        $isFollower = Follower::where(['author_id'=>$request->author_id,'follower_id'=>Auth::user()->id])
            ->count();

        if($isFollower == 1) {

            Follower::where(['author_id'=>$request->author_id,'follower_id'=>Auth::user()->id])
                ->delete();
            
            $request->session()->flash('follow_feedback', 'You are not longer following author');
            $request->session()->flash('follow_feedback_class', 'alert alert-info');

            return redirect()->back();

        } else {

            $request->session()->flash('follow_feedback', 'Invalid Request, please try again!');
            $request->session()->flash('follow_feedback_class', 'alert alert-danger');

            return redirect()->back();

        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)
            ->select('id','post_heading','post_slug','created_at')
            ->orderBy('created_at','desc')
            ->paginate();
        return view('home', compact('posts'));
    }
}
