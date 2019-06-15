<?php

namespace App;

use App\Filters\PostFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $with = ['author', 'category', 'tags'];

    public function author()
    {
        return $this->belongsTo(User::class)->withCount('posts');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function published()
    {
        return static::latest('published_at')
            ->published();
    }

    public static function popular()
    {
        return static::orderBy('views', 'desc')
            ->published()
            ->take(3)
            ->get();
    }

    public static function archives()
    {
        return static::selectRaw('count(*) posts_count, year(published_at) year, monthname(published_at) month')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->get();
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFilter($query, PostFilters $filters)
    {
        return $filters->apply($query);
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at <= Carbon::now();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return "/posts/{$this->category->slug}/$this->slug";
    }
}
