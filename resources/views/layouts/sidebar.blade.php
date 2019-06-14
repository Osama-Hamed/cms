<div class="col-md-4">
    <aside class="right-sidebar">
        <div class="search-widget">
            <form action="/posts" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Search for..." name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-lg btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach ($categories as $category)
                        <li>
                            <a href="/posts/{{ $category->slug }}"><i
                                        class="fa fa-angle-right"></i> {{ $category->name }}</a>
                            <span class="badge pull-right">{{ $category->posts_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach ($popularPosts as $post)
                        <li>
                            <div class="post-image">
                                <a href="{{ $post->path() }}">
                                    <img src="{{ $post->image }}"/>
                                </a>
                            </div>
                            <div class="post-body">
                                <h6><a href="{{ $post->path() }}">{{ $post->title }}</a></h6>
                                <div class="post-meta">
                                    <span>{{ $post->published_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach ($tags as $tag)
                        <li><a href="?tag={{ $tag->slug }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>
</div>