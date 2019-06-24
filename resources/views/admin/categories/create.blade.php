@extends ('admin.layouts.master')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Add New Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/Catgories">Category</a></li>
            <li class="active">Add New Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form role="form" id="post-form" action="/admin/categories" method="POST" enctype="multipart/form-data">
                @csrf

                @include ('admin.categories.form', ['category' => new \App\Category()])
            </form>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection
