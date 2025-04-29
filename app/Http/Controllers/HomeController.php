<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts        = Post::withCount('comments')->get();
        $recent_posts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories   = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();

        return view('home', compact('posts', 'recent_posts', 'categories'));
    }
}
