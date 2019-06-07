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
                    <li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name }}</a></li>
                    <li><i class="fa fa-clock-o"></i>
                        <time> {{ $post->published_at->diffForHumans() }}</time>
                    </li>
                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                </ul>
            </div>
            <div class="pull-right">
                <a href="{{ $post->path() }}">Continue Reading &raquo;</a>
            </div>
        </div>
    </div>
</article>