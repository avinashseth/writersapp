<div class="row">
        <div class="col-md-12">
            @if(Session::has('blog_feedback'))
                <div class="{{ Session::get('blog_feedback_class') }}">{{ Session::get('blog_feedback') }}</div>
            @endif
            <form action="{{ route('post-edit-blog',['blog_id'=>$post->id,'blog_slug'=>$post->post_slug]) }}" method="post">
                @csrf
                <p>Last Updated {{ $post->updated_at->diffForHumans() }}</p>
                <div class="form-group">
                    <label class="form-label">Blog Heading</label>
                    <input type="text" class="form-control" name="blog_heading" value="{{ old('blog_heading', $post->post_heading) }}" />
                </div>
                @error('blog_heading')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label">Blog Body</label>
                    <textarea name="blog_body" class="form-control">{{ old('blog_body', $post->post_body) }}</textarea>
                </div>
                @error('blog_body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <input type="submit" value="Update Blog" class="btn btn-primary" />
                </div>
            </form>
        </div>
  </div>