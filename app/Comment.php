<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author_name', 'author_email', 'author_url', 'body'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
