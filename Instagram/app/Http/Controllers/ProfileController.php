<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except("index");
    }

    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('profile.index', [
            "user" => $user
        ]);
        // return $user->profile;
    }

    public function edit($id){
        $user = User::find($id);

        if(Gate::allows('profile-edit',$user)){
            return view("profile.edit",[
                "user" => $user
            ]);
        }else{
            return back();
        }
    }

    public function update($id){
        $data = request()->validate([
            "title" => "required",
            "description" => "required",
            "url" => "url",
            "pf_image" => "image"
        ]);

        $profile_detail = Profile::findOrFail($id);

        if(request()->pf_image){
            $path = request()->pf_image->store("profile", "public");
            $profile_detail->image = $path;
            // $profile_detail->image = "yes";
        }

        $profile_detail->title = request()->title;
        $profile_detail->url = request()->url;
        $profile_detail->description = request()->description;
        $profile_detail->save();

        $user = $profile_detail->user->id;

        return redirect("/home/$user");
    }

}
