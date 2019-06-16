<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Post;

class CommentsController extends Controller
{
    public function store($categorySlug, Post $post, StoreCommentRequest $form)
    {
        return redirect($form->save()->commentsPath())
            ->with('message', 'Your comment added successfully.');
    }
}
