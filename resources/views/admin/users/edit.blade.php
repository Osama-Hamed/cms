@extends ('admin.layouts.master')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Edit User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/users">User</a></li>
            <li class="active">Update User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form role="form" id="post-form" action="/admin/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include ('admin.users.form', compact('user'))
            </form>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection
