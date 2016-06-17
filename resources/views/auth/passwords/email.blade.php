@extends('layouts.app')

@section('title', 'Reset password')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="auth-head">
                    <h3 class="text-center">Password reset</h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['url' => 'password/email', 'method' => 'POST']) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">
                                Enter your email address and we will send you a link to reset your password.
                            </label>
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" placeholder="yourname@example.com">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">
                                Send password reset email
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
