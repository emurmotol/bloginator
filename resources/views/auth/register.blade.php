@extends('layouts.app')

@section('title', 'Sign up')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="auth-head">
                    <h3 class="text-center">Sign up for&nbsp;<span class="logo-font">{{ trans('app.title') }}</span>
                    </h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => 'register', 'method' => 'POST']) !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="control-label">Username</label>

                            <div class="input-group">
                                <span class="input-group-addon" id="username">@</span>
                                <input id="username" type="text" class="form-control" name="username"
                                       value="{{ old('username') }}"
                                       placeholder="username">
                            </div>
                            @if ($errors->has('username'))
                                <span class="help-block">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Confirm password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" placeholder="Confirm password" autocomplete="off">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">
                                Create an account
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <span class="text-muted">
                            Already have an account?&nbsp;<a href="{{ url('login') }}">Sign in.</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
