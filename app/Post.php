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
}
