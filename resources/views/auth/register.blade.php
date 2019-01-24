@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="register-box">
        <div class="register-logo">
            {{ __('Register') }}
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group has-feedback">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Full name" required autofocus>
                        <span class="fa fa-user form-control-feedback"></span>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        <span class="fa fa-envelope form-control-feedback"></span>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" placeholder="Company">
                        <span class="fa fa-building form-control-feedback"></span>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="activity" type="text" class="form-control{{ $errors->has('activity') ? ' is-invalid' : '' }}" name="activity" value="{{ old('activity') }}" placeholder="Activity">
                        <span class="fa fa-briefcase form-control-feedback"></span>

                        @if ($errors->has('activity'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('activity') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                        <span class="fa fa-lock form-control-feedback"></span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
                        <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                     <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
