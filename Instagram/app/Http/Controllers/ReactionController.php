<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReactionController extends Controller
{
    public function __construct()
    {
         $this->middleware("auth");
         $this->middleware("verified");
    }

    public function comment($id){
        $post = Post::find($id);
        $user_id= $post->user_id;
        $user = User::find($user_id);
        return view("comments.comments",[
            "post" => $post,
            "original_post_owner_data" => $user
        ]);
    }

    public function content($id){
        $validation = validator(request()->all(),[
            "content" => "required",
        ]);
        if($validation->fails()){
            return back()->withErrors($validation);
        }
        $post = $id;
        $comment_user_id = auth()->user()->id;
        $content = request()->content;

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id =  $comment_user_id;
        $comment->content = $content;
        $comment->save();
        return back();
    }

    public function delete($id){
        $comment = Comment::find($id);
        if(Gate::allows("delete-action",$comment)){
            $comment->delete();
            return back();
        }else{
            return back();
        }

    }

    public function like(){
        $validation = validator(request()->all(),[
            "post_id" => "required"
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }
        $liking = auth()->user();
        $liking->likings()->attach(request()->post_id);

        return back();
    }

    public function unlike(){
        $validation = validator(request()->all(),[
            "post_id" => "required"
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $follower = auth()->user();
        $follower->likings()->detach(request()->post_id);

        return back();
    }
}
