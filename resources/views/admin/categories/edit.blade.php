@extends ('admin.layouts.master')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Edit Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li class="active">Edit Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form role="form" id="post-form" action="/admin/categories/{{ $category->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include ('admin.categories.form', compact('category'))
            </form>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection
