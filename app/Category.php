<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('postsCount', function ($builder) {
            return $builder->withCount('posts');
        });
    }

    public function posts()
    {
    	return $this->hasMany(Post::class)->published();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public static function getAll()
    {
        return static::all();
    }
}
