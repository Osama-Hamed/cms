@extends('admin.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Display all posts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/posts">Posts</a></li>
            <li class="active">All Posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a href="/admin/posts/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                        </div>

                        <div class="pull-right">
                            @foreach($postsCount as $status => $count)
                                @if ($loop->last)
                                    <a href="/admin/posts?status={{ $status }}" class="{{ $status == request()->query('status') ? 'selected-status' : '' }}"> {{ ucfirst($status) }}({{ $count }})</a>
                                @else
                                    <a href="/admin/posts?status={{ $status }}" class="{{ $status == request()->query('status') ? 'selected-status' : '' }}"> {{ ucfirst($status) }}({{ $count }})</a> &#124;
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ str_limit($post->title, 50) }}</td>
                                    <td>{{ $post->author->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        {{ $post->created_at->format('d/m/Y') }} |
                                        <span class="label label-{{ $post->status['label'] }}">{{ $post->status['status'] }}</span>
                                    </td>
                                    <td>
                                        <a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-xs btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="/admin/posts/{{ $post->slug }}" method="POST"
                                              style="display: inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="pull-left">
                            {{ $posts->appends(request()->query())->links() }}
                        </div>

                        <div class="pull-right">
                            <small>{{ $posts->total() }} {{ str_plural('post', $posts->total()) }}</small>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->

@endsection

@section ('javascripts')
    @parent

    <script>
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection