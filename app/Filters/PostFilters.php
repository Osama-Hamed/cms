<?php

namespace App\Filters;

use App\Post;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostFilters extends Filters
{
    protected $filters = ['by', 'popular', 'search', 'tag', 'month', 'year'];

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

        return $this->builder->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        });
    }

    protected function month($month)
    {
        return $this->builder->whereMonth('published_at', Carbon::parse($month)->month);
    }

    protected function year($year)
    {
        return $this->builder->whereYear('published_at', $year);
    }
}