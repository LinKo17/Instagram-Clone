<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    {{-- bs css link --}}
    <link rel="stylesheet" href="bs-css.css">

    {{-- css link --}}
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <div class="container container_profile_blade mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (count($users) != 0)

                    @foreach ($users as $user)
                        <div class="border rounded p-2 d-flex align-items-center my-1">
                            <div class="">

                                @if ($user->profile->image)
                                    <img src="storage\{{ $user->profile->image }}" alt=""
                                        class="others-profile">
                                @else
                                    <img src="profile/a.jpg" alt="" class="others-profile">
                                @endif
                            </div>

                            <div class="ms-3">
                                <a href="{{ url("home/$user->id") }}" class="others-name">
                                    {{ $user->username }}
                                </a>
                            </div>

                        </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center align-items-center others-empty">
                        <h1>Empty</h1>
                    </div>
                @endif


            </div>
        </div>
    </div>
</body>

</html>
