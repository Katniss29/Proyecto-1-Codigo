<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\User;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('posts', [
            'posts' => $category->posts
        ]);
    }

    public function authors(User $author)
    {
        return view('posts', [
            'posts' => $author->posts
        ]);
    }
}