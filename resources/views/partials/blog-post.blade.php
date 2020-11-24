<div class="blog-post">
<h2 class="blog-post-title">{{ $post->post_heading }}</h2>
<p class="blog-post-meta">Written on {{ $post->created_at }} by <img src="https://www.gravatar.com/avatar/{{ md5($post->user->id) }}" height="25px" width="25px"/> <a href="{{ route('get-all-blogs-by-author', ['author_name_slug' => Str::slug($post->user->name), 'author_id' => $post->user->id ]) }}">{{ $post->user->name }}</a></p>
@if(Auth::user()->id != $post->user->id)
    <p><a href="{{ route('get-follow-author',['author_id'=>$post->user->id]) }}" class="btn btn-primary btn-sm">Follow {{ $post->user->name }}</a></p>
@endif
<p>{{ $post->post_body }}</p>
</div><!-- /.blog-post -->