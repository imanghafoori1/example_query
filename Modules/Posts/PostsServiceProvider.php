<?php

namespace Modules\Posts;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Modules\Posts\Models\Post;

class PostsServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Here we register relations dynamically to preserve proper modularity and decoupling.
        User::resolveRelationUsing('posts', function (User $user) {
            return $user->hasMany(Post::class);
        });
        User::resolveRelationUsing('latestPost', function (User $user) {
            return $user->hasOne(Post::class)->latestOfMany();
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
