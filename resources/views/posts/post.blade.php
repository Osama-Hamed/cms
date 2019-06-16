<article class="post-item">
    @if ($post->image)
        <div class="post-item-image">
            <a href="{{ $post->path() }}">
                <img src="{{ $post->image }}" alt="">
            </a>
        </div>
    @endif

    <div class="post-item-body">
        <div class="padding-10">
            <h2><a href="{{ $post->path() }}">{{ $post->title }}</a></h2>

            @markdown($post->excerpt)
        </div>

        <div class="post-meta padding-10 clearfix">
            <div class="pull-left">
                <ul class="post-meta-group">
                    <li><i class="fa fa-user"></i><a
                                href="/posts?by={{ $post->author->name }}"> {{ $post->author->name }}</a></li>
                    <li><i class="fa fa-clock-o"></i>
                        <time> {{ $post->published_at->diffForHumans() }}</time>
                    </li>
                    <li><i class="fa fa-folder"></i><a
                                href="/posts/{{ $post->category->slug }}"> {{ $post->category->name }}</a></li>
                    <li>
                        <i class="fa fa-tags"></i>
                        @foreach ($post->tags as $tag)
                            <a href="?tag={{ $tag->slug }}">#{{ $tag->name }}</a>
                        @endforeach
                    </li>
                    <li><i class="fa fa-comments"></i><a href="{{ $post->commentsPath() }}">{{ $post->comments_count }} {{ str_plural('comment', $post->comments_count) }}</a></li>
                    <li><i class="fa fa-eye"></i>
                        {{ $post->views }} {{ str_plural('view', $post->views) }}
                    </li>
                </ul>
            </div>
            <div class="pull-right">
                <a href="{{ $post->path() }}">Continue Reading &raquo;</a>
            </div>
        </div>
    </div>
</article>