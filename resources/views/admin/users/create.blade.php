@extends ('admin.layouts.master')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Add New User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li class="active">Add New User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form role="form" id="post-form" action="/admin/users" method="POST" enctype="multipart/form-data">
                @csrf

                @include ('admin.users.form', ['user' => new \App\User(), 'roleId' => null])
            </form>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection
