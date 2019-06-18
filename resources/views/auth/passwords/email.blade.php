@extends('auth.layouts.master')

@section('content')
    <div class="login-box">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group @error('email') has-error @enderror">

                    <input id="email" type="email"
                           class="form-control @error('email') has-error @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-flat">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
