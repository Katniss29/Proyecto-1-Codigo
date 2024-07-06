<?php


use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use App\Http\Controllers\NewsletterController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::post('/', [PostController::class, 'index']);
Route::post('newsletter', NewsletterController::class);


Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('registers', [RegisterController::class, 'create'])->middleware('guest');
Route::post('registers', [RegisterController::class, 'store'])->middleware('guest');

Route::get('loginn', [SessionsController::class, 'create'])->middleware('guest');
Route::post('loginn', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');