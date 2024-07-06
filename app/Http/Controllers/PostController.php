<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\User;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Obtener los filtros desde la solicitud
        $filters = [
            'search' => $request->input('search'),
            'category' => $request->input('category'),
            'author' => $request->input('author'),
        ];

        // Consultar los posts filtrados paginados
        $posts = Post::latest()->filter($filters)->paginate(6)->withQueryString();

        // Obtener todas las categorías
        $categories = Category::all();

        // Obtener la categoría actualmente seleccionada
        $currentCategory = null;
        if ($request->has('category')) {
            $currentCategory = Category::firstWhere('slug', $request->category);
        }

        // Retornar la vista con los posts paginados, categorías y categoría actual
        return view('posts.index', compact('posts', 'categories', 'currentCategory'));
    }

    public function show(Post $post)
    {
        // Mostrar la vista del post individual
        return view('posts.show', compact('post'));
    }

    
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }
}