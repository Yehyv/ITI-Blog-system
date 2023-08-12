@extends('layouts.app')
@section('content')
<html>
    <head>
        <link href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.css')}}" rel="stylesheet">
    </head>
    <body>


        <div class="container">
            <div class="row">
                <div class="col-12 pt-2">
                    
                    <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                    <p>{!! $post->body !!}</p>
                    <hr>
                    <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                    <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                    <br><br>
                    
                </div>
            </div>
        </div>
    </body>
</html>
@endsection