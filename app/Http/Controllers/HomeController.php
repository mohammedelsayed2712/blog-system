<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $posts        = Post::withCount('comments')->paginate(8);
        $recent_posts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories   = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();
        $tags         = Tag::latest()->take(15)->get();

        return view('home', compact('posts', 'recent_posts', 'categories', 'tags'));
    }
}
