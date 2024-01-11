@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        {{-- css link --}}
        <link rel="stylesheet" href="css/app.css">

        {{-- js link --}}
        <script src="" defer></script>
    </head>

    <body>
        @php
        if(isset($post->user->profile->image)){
             $path = "storage/" . $post->user->profile->image;
        }else{
             $path = "profile/a.jpg";
        }
     @endphp

        <div class="container container_profile_blade">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <img src="storage\{{$post->image}}" alt="" class="detailImage">
                        </div>
                        <div class="col-12  col-lg-4">
                            <img src="{{$path}}" alt="" class="mini-profile">
                            <a href="#" class="mini-profile-link">
                                <strong class="ms-1">{{$post->user->username}}</strong>
                            </a>

                            <a href="" class="text-decoration-none text-info  ms-1">Follow</a>
                            <div class="profile_line"></div>

                            <a href="#" class="mini-profile-link">
                                <strong class="ms-1">{{$post->user->username}}</strong>
                            </a>
                            <span class="ms-1 fs-6">{{$post->caption}}</span>
                        </div>
                    </div>
                </div>
            </div>
    </body>

    </html>
@endsection
