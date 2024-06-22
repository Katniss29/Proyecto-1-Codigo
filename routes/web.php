<?php


use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::latest()->get(); // Obtén todos los posts ordenados por fecha
    return view('posts', compact('posts')); // Pasa los posts a la vista 'posts'
});


Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' =>  $post
    ]);
});

Route::get('categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('authors/{author:username}', [CategoryController::class, 'authors']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




