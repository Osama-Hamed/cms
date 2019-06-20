@extends ('admin.layouts.master')

@section('stylesheets')
    @parent

    @include ('admin.posts.form-sylesheets')
@endsection

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Add New Post</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/posts">Post</a></li>
            <li class="active">Add New Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form role="form" id="post-form" action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf

                @include ('admin.posts.form')
            </form>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection

@section ('javascripts')
    @parent

    @include ('admin.posts.form-javascripts')
@endsection

