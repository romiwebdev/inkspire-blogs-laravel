<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorProfileController;
use App\Http\Controllers\CommentController;


Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // Dashboard untuk Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/users/{id}', [DashboardController::class, 'showUser'])->name('admin.users.show');
    Route::delete('/admin/users/{id}', [DashboardController::class, 'destroyAuthor'])->name('admin.users.destroy');

    // Dashboard untuk Author
    Route::get('/author/dashboard', [DashboardController::class, 'author'])->name('author.dashboard');

});

//hapus author dan admin
Route::middleware(['auth'])->group(function () {
    Route::delete('/admin/users/{id}', [DashboardController::class, 'destroyAuthor'])->name('admin.users.destroy');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Edit profile admin
Route::middleware('auth', )->group(function () {
    Route::get('admin/profile', [UserManagementController::class, 'editAdmin'])->name('admin.profile.edit');
    Route::post('admin/profile', [UserManagementController::class, 'updateAdmin'])->name('admin.profile.update');
});

// Edit user profile (admin can edit any user profile)
Route::middleware('auth',)->group(function () {
    Route::get('admin/users/{user}/edit', [UserManagementController::class, 'editUser'])->name('admin.users.edit');
    Route::post('admin/users/{user}/edit', [UserManagementController::class, 'updateUser'])->name('admin.users.update');
});

// Rute untuk edit profil
Route::middleware('auth')->group(function () {
    Route::get('author/profile', [AuthorProfileController::class, 'edit'])->name('author.profile.edit');
    Route::post('author/profile', [AuthorProfileController::class, 'update'])->name('author.profile.update');
});

Route::middleware('auth')->group(function () {
    // Route untuk membuat post
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');

    // Route untuk mengedit post
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');

    // Route untuk melihat detail post
    Route::get('/author/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/admin/posts/{id}', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware('auth')->group(function () {
    // Route untuk membuat kategori
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');

    // Route untuk mengedit kategori
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

    // Route untuk menghapus kategori
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Detail postingan
Route::get('/posts/{id}', [FrontendController::class, 'show'])->name('frontend.post');

// Filter berdasarkan kategori atau author
Route::get('/filter', [FrontendController::class, 'filter'])->name('frontend.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('frontend.search');

Route::get('/', [FrontendController::class, 'hero'])->name('frontend.hero');
Route::get('/blogs', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/report', [FrontendController::class, 'report'])->name('frontend.report');

// Route untuk Comment
Route::post('posts/{post}/comment', [CommentController::class, 'store'])->name('comments.store');

// Route untuk menghapus komentar (Hanya Author Post atau Admin yang bisa menghapus)
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');
