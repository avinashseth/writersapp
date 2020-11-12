<div class="blog-post">
<p>{{ $comment->comment }}</p>
<p class="blog-post-meta">Written on {{ $comment->created_at }} by <a href="{{ route('get-all-blogs-by-author', ['author_name_slug' => Str::slug($comment->user->name), 'author_id' => $comment->user->id ]) }}">{{ $comment->user->name }}</a></p>
</div><!-- /.blog-post -->