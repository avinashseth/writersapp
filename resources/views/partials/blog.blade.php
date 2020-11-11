<div class="blog-post">
    <h2 class="blog-post-title">{{ $user->name }}</h2>
    @if($user->post->count() > 1) 
        <h3>Has contributed {{ $user->post->count() }} blogs</h3>
    @else
        <h3>Has contributed {{ $user->post->count() }} blog</h3>
    @endif
    <p class="blog-post-meta">Joined {{ $user->created_at }} <a href="{{ route('get-all-blogs-by-author', ['author_name_slug' => Str::slug($user->name), 'author_id'=>$user->id]) }}">Read Now</a></p>
</div><!-- /.blog-post -->