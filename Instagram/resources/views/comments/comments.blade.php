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

    {{-- font awesome link --}}
    <link rel="stylesheet" href="font-awesome.css">
</head>

<body>

    <div class="container container_profile_blade mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6 border rounded p-2">

                <h5 class="text-center text-light bg-dark p-2">
                    {{ $original_post_owner_data->username }} 's comment section
                </h5>

                <form method="post">
                    @csrf
                    <textarea class="form-control" name="content"></textarea>
                    <button class="btn btn-primary my-1">Add Comment</button>
                </form>

                {{-- -------------------------------------------------- --}}
                <div class="fs-5 my-1">Comments ({{count($post->comments) ?? 0}})</div>

                @foreach ($post->comments as $comment)
                    <div class=" my-3 d-flex">

                        <div class="pf_image_comment me-1">
                            @php
                            if (isset($comment->user->profile->image)) {
                                $path = 'storage/' . $comment->user->profile->image;
                            } else {
                                $path = 'profile/a.jpg';
                            }
                            @endphp

                            <img src={{$path}} class="comment_image">
                        </div>

                        <div class="pf_other border p-1 rounded">



                            <a href="{{url("home/{$comment->user->id}")}}" class="pf_name" style="word-break: break-all"
                                id="nav_user_search_name">{{$comment->user->name}}</a>


                            <div class="pf_comment">{{$comment->content}}</div>

                            <div class="pf_action">
                                <span class="text-muted time" style="font-size:13px">{{$comment->created_at->diffForHumans()}}</span>

                                {{-- <span class="reply">reply</span>

                                <a href="" class="badge bg-danger"
                                    style="text-decoration: none; color:white;"></a> --}}

                            </div>


                        </div>

                        @can("delete-action",$comment)
                        <div class="d-flex align-items-center">
                            <a href="{{url("/comment/delete/$comment->id")}}">
                                <i class="fa-solid fa-trash text-danger ms-1 "></i>
                            </a>
                        </div>
                        @endcan
                    </div>
                @endforeach



            </div>
        </div>
    </div>
</body>

</html>
