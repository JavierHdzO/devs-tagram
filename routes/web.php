<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use Illuminate\Support\Facades\Route;

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
    return view('main');
});

Route::get('/signup', [RegisterController::class, 'index'])->name('signup');
Route::post('/signup', [RegisterController::class, 'store'])->name('signup');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comment.store');

Route::post('/images', [ImageController::class, 'store'])->name('images.store')->middleware('auth');

Route::post('/post/{post}/reaction',[ReactionController::class, 'store'])->name('post.reaction.store');
Route::delete('/post/{post}/reaction',[ReactionController::class, 'destroy'])->name('post.reaction.destroy');



Route::get('/profile/edit', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/edit', [ProfileController::class, 'store'])->name('profile.store');

Route::post('/{user:username}/follow', [FollowerController::class,'store'])->name('user.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class,'destroy'])->name('user.unfollow');
