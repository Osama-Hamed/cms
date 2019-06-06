@extends ('layouts.master')

@section ('content')

    @foreach ($posts as $post)
        @include ('posts.post')
    @endforeach

    <nav class="text-center">
        {{ $posts->links() }}
    </nav>

@endsection
