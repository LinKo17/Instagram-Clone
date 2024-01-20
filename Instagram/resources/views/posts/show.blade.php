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
            if (isset($post->user->profile->image)) {
                $path = 'storage/' . $post->user->profile->image;
            } else {
                $path = 'profile/a.jpg';
            }
        @endphp

        @if(isset($post->id))
        <div class="container container_profile_blade">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-12 col-lg-7 my-1">
                            <img src="storage\{{ $post->image }}" alt="" class="detailImage">
                        </div>

                        <div class="col-12  col-lg-5 my-1">

                            <div class=" d-flex justify-content-between align-items-center">

                                <div class="">
                                    <img src="{{ $path }}" alt="" class="mini-profile">

                                    <a href="{{ url("home/$post->user_id") }}" class="mini-profile-link">
                                        <strong class="ms-1">{{ $post->user->username }}</strong>
                                    </a>

                                </div>

                                @can('profile-dot', $post->user)
                                    <div class="dropdown">
                                        <i class="fa-solid fa-ellipsis fs-3 detail-three-dot" data-bs-toggle="dropdown"></i>


                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="dropdown-item">
                                                <a href="{{url("/post/edit/$post->id")}}" class="nav-link text-center text-success">edit</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="{{url("/post/$post->id")}}" class="nav-link text-center text-danger">delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endcan
                            </div>

                            <span class="">
                                {{ $post->created_at->diffForHumans() }}
                            </span>





                            <div class="profile_line"></div>

                            <a href="{{ url("home/$post->user_id") }}" class="mini-profile-link">
                                <strong class="ms-1">{{ $post->user->username }}</strong>
                            </a>
                            <span class="ms-1 fs-6">{{ $post->caption }}</span>

                            <div class="profile_line"></div>
                            {{-- ------------------------------------- --}}
                            <div class="my-2">

                                <form action=""  class="d-inline">
                                    <button class="reaction-button">
                                        <i class="fa-regular fa-heart fs-5"></i>
                                    </button>
                                </form>

                                <a href="{{url("comment/$post->id")}}" class="text-dark">
                                    <i class="fa-regular fa-comment fs-5 ms-2"></i>
                                </a>
                            </div>

                            <div class="my-1 d-flex align-items-center">
                                <div>
                                    <i class="fa-solid fa-heart fs-5"></i>
                                </div>
                                <div class="fs-5 ms-1">0 like</div>
                            </div>
                            {{-- ------------------------------------- --}}
                        </div>
                    </div>
                </div>
        </div>
        @else
            <div class="d-flex justify-content-center align-items-center" style="height:100vh">
                <h1>Not Found</h1>
            </div>
        @endif

        </body>

    </html>
@endsection
