@extends('auth.layouts.master')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>My</b>BLOG</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group @error('email') has-error @enderror">
                    <input id="email" type="email"
                           class="form-control" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback"></span>

                    @error('email')
                    <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <input id="password" type="password"
                           class="form-control" name="password"
                           required autocomplete="current-password" placeholder="Password">
                    <span class="fa fa-lock form-control-feedback"></span>

                    @error('password')
                    <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <br>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">I forgot my password</a><br>
            @endif

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection
