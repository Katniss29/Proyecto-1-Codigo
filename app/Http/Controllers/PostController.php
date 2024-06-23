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
        // Obtener los filtros desde la solicitud
        $filters = [
            'search' => $request->input('search'),
            'category' => $request->input('category'),
        ];

        // Consultar los posts filtrados
        $posts = Post::latest()->filter($filters)->get();

        // Obtener todas las categorías
        $categories = Category::all();

        // Obtener la categoría actualmente seleccionada
        $currentCategory = null;
        if ($request->has('category')) {
            $currentCategory = Category::firstWhere('slug', $request->category);
        }

        // Retornar la vista con los posts, categorías y categoría actual
        return view('posts', compact('posts', 'categories', 'currentCategory'));
    }

    public function show(Post $post)
    {
        // Mostrar la vista del post individual
        return view('post', compact('post'));
    }
}