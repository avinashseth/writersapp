<div class="blog-post">
    <h3>{{ $post->post_heading }}</h3>
    <p class="blog-post-meta">Written on {{ $post->created_at }} <a href="{{ route('get-read-blog-by-author', ['blog_slug' => $post->post_slug, 'blog_id' => $post->id]) }}">Read Now</a></p>
</div><!-- /.blog-post -->