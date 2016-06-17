@extends('layouts.app')

@section('title', 'Reset password')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="auth-head">
                    <h3 class="text-center">Reset your password</h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => 'password/reset', 'method' => 'POST']) !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{ $email or old('email') }}" placeholder="yourname@example.com">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">New password</label>
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="New password" autocomplete="off">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Confirm password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" placeholder="Confirm password" autocomplete="off">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Reset password</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
