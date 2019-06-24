<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('postsCount', function ($builder) {
            return $builder->withCount('posts');
        });

        static::deleting(function ($category) {
            DB::table('posts')
                ->where('category_id', $category->id)
                ->get()
                ->each(function ($post) {
                    Post::find($post->id)->delete();
                });
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
