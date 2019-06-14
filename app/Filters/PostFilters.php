<?php

namespace App\Filters;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\DB;

class PostFilters extends Filters
{
    protected $filters = ['by', 'popular', 'search', 'tag'];

    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('author_id', $user->id);
    }

    protected function popular()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('views', 'desc');
    }

    protected function search($title)
    {
        return $this->builder->where('title', 'like', "%{$title}%");
    }

    protected function tag($tagSlug)
    {
        $tag = Tag::where('slug', $tagSlug)->firstOrFail();

        $this->builder->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        });
    }
}