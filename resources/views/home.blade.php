@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts Contributed By You</div>

                <div class="card-body">
                    @if(Session::has('blog_feedback_message'))
                        <div class="{{ Session::get('blog_feedback_class') }}">{{ Session::get('blog_feedback_message') }}</div>
                    @endif
                    @if(sizeof($posts) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Post Name</th>
                                    <th scope="col">Post Link</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->post_heading }}</td>
                                    <td><a href="{{ route('get-read-blog-by-author',['blog_id'=>$post->id, 'blog_slug'=>$post->post_slug]) }}" target="_blank">Read Now</a></td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('get-edit-blog', ['blog_id'=>$post->id, 'blog_slug'=>$post->post_slug]) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('get-blog-delete', ['blog_id'=>$post->id, 'blog_slug'=>$post->post_slug]) }}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>{{ $posts->links() }}</div>
                    @else
                        <a href="{{ route('get-add-new-blog') }}" class="btn btn-primary">Create Your First Post</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection