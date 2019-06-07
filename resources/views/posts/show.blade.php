@extends ('layouts.master')

@section ('content')

    <article class="post-item post-detail">
        @if ($post->image)
            <div class="post-item-image">
                <img src="{{ $post->image }}" alt="">
            </div>
        @endif

        <div class="post-item-body">
            <div class="padding-10">
                <h1>{{ $post->title }}</h1>

                <div class="post-meta no-border">
                    <ul class="post-meta-group">
                        <li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name }}</a></li>
                        <li><i class="fa fa-clock-o"></i>
                            <time> {{ $post->published_at->diffForHumans() }}</time>
                        </li>
                        <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                        <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                </div>

                @markdown($post->body)
            </div>
        </div>
    </article>

    <article class="post-author padding-10">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img alt="Author 1" src="{{ asset('cms/img/author.jpg') }}" class="media-object">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><a href="#">{{ $post->author->name }}</a></h4>
                <div class="post-author-count">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        90 posts
                    </a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi
                    neque
                    sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus
                    consequuntur!
                    Non.</p>
            </div>
        </div>
    </article>

    @include ('posts.comments')

@endsection