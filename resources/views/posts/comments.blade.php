<article class="post-comments" id="post-comments">
    <h3><i class="fa fa-comments"></i> {{ $post->comments_count }} {{ str_plural('comment', $post->comments_count) }}
    </h3>

    <div class="comment-body padding-10">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <ul class="comments-list">
            @foreach ($comments as $comment)
                <li class="comment-item" id="post-comment-{{ $comment->id }}">
                    <div class="comment-heading clearfix">
                        <div class="comment-author-meta">
                            <h4>{{ $comment->author_name }}
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </h4>
                        </div>
                    </div>
                    <div class="comment-content">
                        @markdown ($comment->body)
                    </div>
                </li>
            @endforeach
        </ul>

        <nav class="text-center">
            {{ $comments->links() }}
        </nav>

    </div>

    <div class="comment-footer padding-10" id="comment-form">
        <h3>Leave a comment</h3>

        <form action="{{ $post->path() }}/comments" method="POST">
            @csrf

            <div class="form-group required {{ $errors->has('author_name') ? 'has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" name="author_name" id="name" class="form-control" value="{{ old('author_name') }}">
                @error('author_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group required {{ $errors->has('author_email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input type="text" name="author_email" id="email" class="form-control" value="{{ old('author_email') }}">
                @error('author_email')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group {{ $errors->has('author_url') ? 'has-error' : '' }}">
                <label for="website">Website</label>
                <input type="text" name="author_url" id="website" class="form-control" value="{{ old('author_url') }}">
                @error('author_url')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group required {{ $errors->has('body') ? 'has-error' : '' }}">
                <label for="comment">Comment</label>
                <textarea name="body" id="comment" rows="6" class="form-control">{{ old('body') }}</textarea>
                @error('body')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="clearfix">
                <div class="pull-left">
                    <button type="submit" class="btn btn-lg btn-success">Add Comment</button>
                </div>
                <div class="pull-right">
                    <p class="text-muted">
                        <span class="required">*</span>
                        <em>Indicates required fields</em>
                    </p>
                </div>
            </div>
        </form>
    </div>
</article>