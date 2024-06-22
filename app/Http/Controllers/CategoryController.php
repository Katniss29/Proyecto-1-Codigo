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
        $categories = Category::all(); // Obtener todas las categorías
        $currentCategory = $category; // Obtener la categoría actual
        return view('posts', compact('posts', 'categories', 'currentCategory')); // Pasar posts, categories y currentCategory a la vista 'posts'
    }

    public function authors(User $author)
    {
        $posts = $author->posts;
        $categories = Category::all(); // Obtener todas las categorías
        return view('posts', compact('posts', 'categories')); // Pasar posts y categories a la vista 'posts'
    }

    public function index()
    {
        $posts = Post::latest()->get();
        $categories = Category::all();
        return view('posts', compact('posts', 'categories'));
    }
}