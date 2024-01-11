@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <base href="/public">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Profile</title>

        {{-- css link --}}
        <link rel="stylesheet" href="css/app.css">

        {{-- js link --}}
        <script src="" defer></script>

    </head>

    <body>
        <div class="container container_profile_blade">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    {{-- profile section --}}
                    @php
                       if(isset($user->profile->image)){
                            $path = "storage/" . $user->profile->image;
                       }else{
                            $path = "profile/a.jpg";
                       }
                    @endphp

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 py-2 ">
                            <div class="container profile-img-box">
                                <img src={{$path}} alt="">
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-6 col-12  px-4 py-2">
                            <div class="profile_name d-flex justify-content-between text-align-baseline">

                                <div class="d-flex text-align-baseline">
                                    <h1 class=" fs-5">{{ $user->username }}</h1>
                                    <button class="btn btn-sm btn-primary ms-2">Follow</button>
                                </div>

                                @auth
                                    @can("post-add",$user)
                                    <a href="{{ url("/post/create/$user->id") }}" class="btn btn-sm btn-primary">Add New Post</a>
                                    @endcan
                                @endauth
                            </div>

                            <div>
                                @auth
                                    @can('profile-edit', $user)
                                        <a href="{{ url("/home/edit/$user->id") }}">Edit Profile</a>
                                    @endcan
                                @endauth
                            </div>

                            <div class="d-flex mt-2">
                                <div class="pe-3"><strong class="pe-1">{{ count($user->posts) }}</strong>posts</div>
                                <div class="pe-3"><strong class="pe-1">23k</strong>followers</div>
                                <div class="pe-3"><strong class="pe-1">212</strong>following</div>
                            </div>

                            <div class="pt-3">
                                <strong>{{ $user->profile->title }}</strong>
                            </div>
                            <div>{{ $user->profile->description }}</div>
                            <div>
                                <a href="https://www.freecodecamp.org/news/learn-to-code-rpg/">{{ $user->profile->url }}</a>
                            </div>


                        </div>
                    </div>

                    {{-- user data --}}
                    <div class="row mt-3">
                        @foreach ($user->posts as $item)
                            <div class="col-4 mb-1">

                                <a href="{{ url("/post/show/$item->id") }}">
                                    <img src="/storage/{{ $item->image }}" class="w-100" style="height: 200px;">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </body>

    </html>
@endsection
