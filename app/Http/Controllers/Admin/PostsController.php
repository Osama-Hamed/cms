<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Filters\Admin\PostFilters;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(PostFilters $filters)
    {
        $posts = Post::latest()->filter($filters)->paginate(5);
        $postsCount = [
            'all' => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft' => Post::draft()->count(),
        ];

        return view('admin.posts.index', compact('posts', 'postsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $form
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $form)
    {
        $form->save();

        return redirect('/admin/posts')
            ->with('message', 'Post has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $form
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $form, Post $post)
    {
        if ($form->file('image')) $post->removeImage();

        $form->save();

        return redirect('/admin/posts')
            ->with('message', 'Post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->removeImage();

        $post->delete();

        return back()->with('message', 'Post deleted successfully.');
    }
}
