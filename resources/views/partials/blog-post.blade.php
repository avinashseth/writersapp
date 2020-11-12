<div class="blog-post">
<h2 class="blog-post-title">{{ $post->post_heading }}</h2>
<p class="blog-post-meta">Written on {{ $post->created_at }} by <a href="{{ route('get-all-blogs-by-author', ['author_name_slug' => Str::slug($post->user->name), 'author_id' => $post->user->id ]) }}">{{ $post->user->name }}</a></p>
<p>{{ $post->post_body }}</p>
</div><!-- /.blog-post -->