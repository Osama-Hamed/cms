<?php

namespace App\Filters\Admin;

use App\Filters\Filters;
use App\Post;

class PostFilters extends Filters
{
    protected $filters = ['status'];

    protected function status($status)
    {
        if (method_exists(Post::class, 'scope' . ucfirst($status))) return $this->builder->$status();
    }
}