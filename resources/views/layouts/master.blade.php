<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>MyBlog | My Awesome Blog</title>

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="{{ asset('cms/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('cms/css/custom.css') }}">
    </head>
    <body>
        @include ('layouts.header')

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield ('content')
                </div>

                @include ('layouts.sidebar')
            </div>
        </div>

        @include ('layouts.footer')

        <script src="{{ asset('cms/js/jquery.min.js') }}"></script>
        <script src="{{ asset('cms/js/bootstrap.min.js') }}"></script>
    </body>
</html>