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
                        <li><i class="fa fa-user"></i><a href="/posts?by={{ $post->author->name }}"> {{ $post->author->name }}</a></li>
                        <li><i class="fa fa-clock-o"></i>
                            <time> {{ $post->published_at->diffForHumans() }}</time>
                        </li>
                        <li><i class="fa fa-folder"></i><a href="/posts/{{ $post->category->slug }}"> {{ $post->category->slug }}</a></li>
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

                @markdown($post->body)
            </div>
        </div>
    </article>

    <article class="post-author padding-10">
        <div class="media">
            <div class="media-left">
                <a href="/posts?by={{ $post->author->name }}">
                    <img alt="Author 1" src="{{ asset('cms/img/author.jpg') }}" class="media-object">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><a href="/posts?by={{ $post->author->name }}">{{ $post->author->name }}</a></h4>
                <div class="post-author-count">
                    <a href="/posts?by={{ $post->author->name }}">
                        <i class="fa fa-clone"></i>
                        {{ $post->author->posts_count }}
                        {{ str_plural('post', $post->author->posts_count) }}
                    </a>
                </div>

                @markdown($post->author->bio)
            </div>
        </div>
    </article>

    @include ('posts.comments')

@endsection