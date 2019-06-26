<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statistics = [
            'totalMembers' => User::count(),
            'totalPosts' => Post::count(),
            'totalComments' => Comment::count(),
            'totalCategories' => Category::count()
        ];
        return view('admin.dashboard', compact('statistics'));
    }
}
