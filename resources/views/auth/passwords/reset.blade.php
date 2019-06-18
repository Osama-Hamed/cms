@extends('auth.layouts.master')

@section('content')
    <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group @error('email') has-error @enderror">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                           placeholder="Email">

                    @error('email')
                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group @error('password') has-error @enderror">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
