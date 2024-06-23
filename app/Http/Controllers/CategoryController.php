<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\User;

class CategoryController extends Controller
{
   

    public function authors(User $author)
    {
        $posts = $author->posts;
        $categories = Category::all(); // Obtener todas las categorías
        return view('posts', compact('posts', 'categories')); // Pasar posts y categories a la vista 'posts'
    }

    public function index()
    {
        $posts = Post::latest();

        if (request('search')) {
            $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        $posts = $posts->get(); // Agregar el método get() al final para ejecutar la consulta y obtener los resultados

        $categories = Category::all();

        return view('posts', compact('posts', 'categories'));
    }
}