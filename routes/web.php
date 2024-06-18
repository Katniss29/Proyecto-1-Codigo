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
  
    return view('posts', [
        'posts' => Post::all()
    ]); 
});


Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' =>  $post
    ]);
});

<<<<<<< HEAD
Route::get('categories/{category}', [CategoryController::class, 'show']);
=======
Route::get('categories/{category}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts
    ]);
});
>>>>>>> a434854402a4837457c54b3eade1dfd1bffd9b2e

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




