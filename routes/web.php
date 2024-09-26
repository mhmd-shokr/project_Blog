<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require   __DIR__ . '/auth.php';

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');


Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/home', function () {
    return view('home'); 
})->middleware(['auth'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::delete('posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
});

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit'); // صفحة تعديل المنشور
Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update'); // تعديل المنشور
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy'); // حذف المنشور
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show'); // صفحة المنشور
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [PostController::class, 'index'])->middleware(['auth'])->name('home');
