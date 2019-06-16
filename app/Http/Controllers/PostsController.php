<?php

namespace App\Http\Controllers;

use App\Filters\PostFilters;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function index(Category $category, PostFilters $filters)
    {
        $posts = $this->getPublishedPosts($category, $filters);

        return view('posts.index', compact('posts'));
    }

    public function show(Category $category, Post $post)
    {
        if (! $post->isPublished()) abort(404);

        $post->increment('views');

        $comments = $post->comments()->simplePaginate(3);

        return view('posts.show', compact('post', 'comments'));
    }

    protected function getPublishedPosts(Category $category, PostFilters $filters)
    {
        $posts = Post::published()->filter($filters);
        
        if ($category->exists) $posts->where('category_id', $category->id);

        return $posts->simplePaginate(3);
    }
}
