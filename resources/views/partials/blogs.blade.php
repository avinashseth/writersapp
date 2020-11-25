<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->post_heading }}</h2>
    <p><a href="{{ route('get-read-blog-by-author',['blog_slug'=>$post->post_slug, 'blog_id'=>$post->id]) }}">Read Now</a></p>
</div><!-- /.blog-post -->