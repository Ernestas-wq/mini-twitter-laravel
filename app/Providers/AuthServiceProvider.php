<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Profile;
use App\Models\Tweet;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-profile', function(User $user, Profile $profile) {
            return $user->id === intval($profile->user_id);
        });
        Gate::define('update-tweet', function(User $user, Tweet $tweet) {
            return $user->id === intval($tweet->user_id);
        });

        Gate::define('access-comment', function(User $user, Comment $comment) {
            return $user->id === intval($comment->user_id);
        });
        Gate::define('can-retweet', function(User $user, Tweet $tweet) {
            return $user->id !== $tweet->user->id;
        });

        //
    }
}
