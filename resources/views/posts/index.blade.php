@extends ('layouts.master')

@section ('content')

    @foreach ($posts as $post)
        @include ('posts.post')
    @endforeach

    <nav class="text-center">
        {{ $posts->appends(request()->query())->links() }}
    </nav>

@endsection
