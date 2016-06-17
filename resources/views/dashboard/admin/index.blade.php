@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="col-md-3">
            @include('dashboard.admin.chunks.menu')
        </div>
        <div class="col-md-9">
            <h1>Administrator</h1>
        </div>
    </div>
@endsection

@include('dashboard.common.welcome')