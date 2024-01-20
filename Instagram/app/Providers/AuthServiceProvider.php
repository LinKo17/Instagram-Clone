<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('profile-edit',function($user,$profile){
            return $user->id == $profile->id;
        });

        Gate::define("post-add",function($user,$post){
            return $user->id == $post->id;
        });

        Gate::define("profile-dot",function($user,$post){
            return $user->id == $post->id;
        });

        Gate::define("delete-action",function($user,$comment){
            return $user->id == $comment->user->id || $user->id == $comment->post->user_id;
        });
    }
}
