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
        <div class="container container_profile_blade">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" action="{{url("/post/update/$post->id")}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>


                            <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption"
                            >{{ old('caption') ?? $post->caption }}</textarea>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>

                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" value="{{ old('image')}}">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div style="margin-left:-10px">
                            <button class="btn btn-primary d-inline">Edit Post</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
