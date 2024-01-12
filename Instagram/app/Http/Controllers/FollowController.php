<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(){
        $validation = validator(request()->all(),[
            "profile_id" => "required"
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $follower = auth()->user();
        $follower->followings()->attach(request()->profile_id);

        return back();
    }

    public function unfollow(){
        $validation = validator(request()->all(),[
            "profile_id" => "required"
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $follower = auth()->user();
        $follower->followings()->detach(request()->profile_id);

        return back();
    }
}
