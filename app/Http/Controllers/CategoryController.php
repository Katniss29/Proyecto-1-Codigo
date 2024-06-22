<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\User;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts; // Obtén los posts asociados a la categoría
        return view('posts', compact('posts')); // Pasa los posts a la vista 'posts'
    }

    public function authors(User $author)
    {
        $posts = $author->posts; // Obtén los posts asociados al autor
        return view('posts', compact('posts')); // Pasa los posts a la vista 'posts'
    }
}