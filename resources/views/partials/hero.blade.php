<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">{{ $post->post_heading }}</h1>
      <p class="lead my-3">{{ $post->post_body }}</p>
      <p class="lead mb-0"><a href="{{ route('get-read-blog-by-author',['blog_slug'=>$post->post_slug, 'blog_id'=>$post->id]) }}" class="text-white font-weight-bold">Read Now</a></p>
    </div>
  </div>