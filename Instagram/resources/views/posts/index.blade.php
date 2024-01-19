@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <base href="/public">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
        {{-- css link --}}
        <link rel="stylesheet" href="css/app.css">
    </head>

    <body>
        <div class="container container_profile_blade">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    {{-- {{ $posts }} --}}
                    @foreach ($posts as $post)
                        <div class="row my-3 border p-2 rounded">

                            <div class="col-12 col-lg-12">
                                <a href="{{ url("/post/show/$post->id") }}">
                                    <img src="storage\{{ $post->image }}" alt="" class="index-image">
                                </a>
                            </div>

                            <div>
                                <a href="{{url("home/$post->user_id")}}" class="mini-profile-link">
                                    <strong class="ms-1">{{ $post->user->username }}</strong>
                                </a>

                                <span class="ms-1 fs-6">{{ $post->caption }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-12 d-flex justify-content-center">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection