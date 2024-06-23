<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\User;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts;
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    public function authors($username)
    {
        $author = User::where('username', $username)->firstOrFail();
        $posts = $author->posts;
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }
}