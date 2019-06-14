<?php

namespace App\Filters;

use App\User;

class PostFilters extends Filters
{
    protected $filters = ['by', 'popular', 'search'];

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
}