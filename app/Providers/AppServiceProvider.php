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
            $categories = \Cache::rememberForever('categories', function () {
                return Category::getAll();
            });

            $tags = \Cache::rememberForever('tags', function () {
                return Tag::has('posts')->get();
            });

            $popularPosts = \Cache::rememberForever('popularPosts', function () {
                return Post::popular();
            });

            $view->with('categories', $categories);
            $view->with('popularPosts', $popularPosts);
            $view->with('tags', $tags);
        });
    }
}
