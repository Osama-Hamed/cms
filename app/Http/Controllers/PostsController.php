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
}
