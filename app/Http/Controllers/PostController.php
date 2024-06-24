<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\User;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::latest();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%');
        }

        if ($category = $request->input('category')) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        }

        if ($author = $request->input('author')) {
            $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        }

        $posts = $query->get();
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
