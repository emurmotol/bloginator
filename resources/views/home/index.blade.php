@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="home-header">
                <h1 class="logo-font"><i class="fa fa-rss" aria-hidden="true"></i>{{ trans('app.title') }}</h1>

                <p>Extremely simple place to blog! We made it really simple for people to make a blog and put whatever
                    they
                    want on it:&nbsp;<span id="fun_fact" class="logo-font"></span></p>

                <div><a href="" class="btn btn-success btn-lg" role="button">Get Started</a></div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $("document").ready(function () {
            var texts = [
                '<i class="fa fa-book" aria-hidden="true"></i>&nbsp;Stories',
                '<i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;Photos',
                '<i class="fa fa-google fa-spin" aria-hidden="true"></i>IFs',
                '<i class="fa fa-television" aria-hidden="true"></i>&nbsp;TV Shows',
                '<i class="fa fa-link" aria-hidden="true"></i>&nbsp;Links',
                'Quips&nbsp;<i class="fa fa-commenting-o" aria-hidden="true"></i>',
                'Dumb J<i class="fa fa-smile-o fa-rotate-180" aria-hidden="true"></i>kes',
                'Smart J<i class="fa fa-smile-o" aria-hidden="true"></i>kes',
                '<i class="fa fa-spotify" aria-hidden="true"></i>&nbsp;Spotify Tracks',
                '<i class="fa fa-music" aria-hidden="true"></i>&nbsp;MP3s',
                '<i class="fa fa-file-video-o" aria-hidden="true"></i>&nbsp;Videos',
                '<i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Art',
                '<i class="fa fa-code" aria-hidden="true"></i>&nbsp;Code',
                '<i class="fa fa-hashtag" aria-hidden="true"></i>&nbsp;Deep Stuff'
            ];
            var obj = $('#fun_fact');
            var i = 0;
            obj.html(texts[i]);
            (function loopIt() {
                i++;
                obj.fadeOut(500, function () {
                    obj.html(texts[i % texts.length]);
                    obj.fadeIn(500, function () {
                        loopIt()
                    });
                });
            }());
        });
    </script>
@endsection
