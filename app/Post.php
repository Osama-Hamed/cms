<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public static function published()
    {
        return static::latest('published_at')
            ->with('author')
            ->where('published_at', '<=', Carbon::now())
            ->simplePaginate(3);
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
        return "/posts/$this->slug";
    }
}
