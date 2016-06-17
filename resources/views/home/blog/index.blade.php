@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="blog-header">
                <h1 class="logo-font">{{ trans('app.title') }}&nbsp;Blog</h1>

                <p>Blogging made simple.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-9">
            @include('home.blog.chunks.posts')
        </div>
        <div class="col-md-3">
            @include('home.blog.chunks.categories.index')
        </div>
    </div>
@endsection
