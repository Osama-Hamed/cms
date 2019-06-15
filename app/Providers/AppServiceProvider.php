<?php

namespace App\Providers;

use App\Post;
use App\Tag;
use Illuminate\Support\ServiceProvider;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('categories', Category::all());
            $view->with('popularPosts', Post::popular());
            $view->with('tags', Tag::has('posts')->get());
            $view->with('archives', Post::archives());
        });
    }
}
