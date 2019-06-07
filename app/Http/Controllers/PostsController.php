<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::published();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (! $post->isPublished()) abort(404);

        return view('posts.show', compact('post'));
    }
}
