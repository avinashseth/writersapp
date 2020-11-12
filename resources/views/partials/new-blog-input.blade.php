<div class="row">
        <div class="col-md-12">
            @if(Session::has('blog_feedback'))
                <div class="{{ Session::get('blog_feedback_class') }}">{{ Session::get('blog_feedback') }}</div>
            @endif
            <form action="{{ route('post-add-new-blog') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label">Blog Heading</label>
                    <input type="text" class="form-control" name="blog_heading" />
                </div>
                @error('blog_heading')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label">Blog Body</label>
                    <textarea name="blog_body" class="form-control"></textarea>
                </div>
                @error('blog_body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <input type="submit" value="Post Blog" class="btn btn-primary" />
                </div>
            </form>
        </div>
  </div>