@extends('layout.base')

@section('title', 'Writers - Writer Heaven')

@section('style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('scripts')

@endsection

@section('body')

    <div class="container">

        @include('partials.header')

        @include('partials.submenu')

    </div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

      @include('partials.blog-post')

    </div><!-- /.blog-main -->

  </div><!-- /.row -->
  <div class="row">
    <div class="col-md-12">
        @if($post->comments->count() > 0)
            @foreach($post->comments as $comment)
                @include('partials.comment')
            @endforeach
        @else
            <div class="blog-post">
            <h2 class="blog-post-title">No comments found</h2>
            </div><!-- /.blog-post -->
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('comment_feedback'))
                <div class="{{ Session::get('comment_feedback_class') }}">{{ Session::get('comment_feedback') }}</div>
            @endif
            <form action="{{ route('post-comment', ['post_id'=>$post->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label">Share your thoughts</label>
                    <textarea name="comment" class="form-control"></textarea>
                </div>
                @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary" />
                </div>
            </form>
        </div>
  </div>

</main><!-- /.container -->

    @include('partials.footer')

@endsection