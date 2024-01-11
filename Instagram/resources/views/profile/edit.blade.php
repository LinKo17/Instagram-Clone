@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        {{-- css link --}}
        <link rel="stylesheet" href="css/app.css">

        {{-- js link --}}
        <script src="" defer></script>
    </head>

    <body>
        <div class="container container_profile_blade">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <h1>Edit Profile</h1>

                    @if (session('info'))
                        <span class="text-success">{{ session('info') }}</span>
                    @endif

                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>


                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') ?? $user->profile->title}}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>


                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                value="{{ old('description') ?? $user->profile->description}}">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="url" class="col-md-4 col-form-label">{{ __('url') }}</label>


                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                                value="{{ old('url') ?? $user->profile->url}}">

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="pf_image" class="col-md-4 col-form-label">{{ __('Picture') }}</label>

                            <input id="pf_image" type="file" class="form-control @error('pf_image') is-invalid @enderror"
                                name="pf_image" value="{{ old('pf_image') ?? $user->profile->image}}">

                            @error('pf_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div style="margin-left:-10px">
                            <button class="btn btn-primary d-inline">Save Profile</button>
                        </div>

                    </form>

                </div>
            </div>

    </body>

    </html>
@endsection
