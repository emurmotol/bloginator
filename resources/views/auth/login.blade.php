@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="auth-head">
                    <h3 class="text-center">Sign in to&nbsp;<span class="logo-font">{{ trans('app.title') }}</span></h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => 'login', 'method' => 'POST']) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email address</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                                   placeholder="yourname@example.com">

                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="Password" autocomplete="off">

                            @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox-inline">
                                <label>
                                    <input type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                            <a class="btn btn-link forgot-psswd-link" href="{{ url('password/reset') }}">
                                Forgot your password?
                            </a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Sign in</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <span class="text-muted">
                            New to <span class="logo-font">{{ trans('app.title') }}</span>?&nbsp;<a
                                    href="{{ url('register') }}">Create an account.</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
