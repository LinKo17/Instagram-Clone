<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth")->except("show");
    }

    public function create($id)
    {
        $user = User::find($id);
        if(Gate::allows("post-add",$user)){
            return view("posts.create");
        }else{
            return back();
        }
    }

    public function store($id)
    {
        request()->validate([
            'caption' => "required",
            'image' => ['required', 'image'],
        ]);

        //    return auth()->user()->id;
        $path = request()->image->store("post", "public");

        $post = new Post();
        $post->caption = request()->caption;
        $post->image  = $path;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect("/home/$id")->with("info", "A post is successfully created!!!");
    }

    public function show($id){
        $post = Post::find($id);
        return view("posts.show",[
            "post" => $post
        ]);
    }
}
