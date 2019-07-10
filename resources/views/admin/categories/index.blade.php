@extends('admin.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Display all categories</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li class="active">All Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a href="/admin/categories/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>Posts count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ str_limit($category->name) }}</td>
                                    <td>{{ $category->posts_count }}</td>
                                    <td>
                                        <a href="/admin/categories/{{ $category->slug }}/edit" class="btn btn-xs btn-warning"
                                            @if (! auth()->user()->hasRole(['admin', 'editor']))
                                                disabled
                                            @endif
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="/admin/categories/{{ $category->slug }}" method="POST"
                                              style="display: inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-xs btn-danger"
                                                @if (! auth()->user()->hasRole(['admin', 'editor']))
                                                    disabled
                                                @endif
                                            >
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
                            {{ $categories->appends(request()->query())->links() }}
                        </div>

                        <div class="pull-right">
                            <small>{{ $categories->total() }} {{ str_plural('category', $categories->total()) }}</small>
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