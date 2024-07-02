<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

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

Route::post('newsletter', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => config('services.mailchimp.server')
    ]);

    try {
        $response = $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => $request->email,
            'status' => 'subscribed'
        ]);

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    } catch (\Exception $e) {
        return redirect('/')->with('error', 'Failed to subscribe: ' . $e->getMessage());
    }
});

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('registers', [RegisterController::class, 'create'])->middleware('guest');
Route::post('registers', [RegisterController::class, 'store'])->middleware('guest');

Route::get('loginn', [SessionsController::class, 'create'])->middleware('guest');
Route::post('loginn', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');