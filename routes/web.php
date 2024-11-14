<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\AdminController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Rute untuk Trip
Route::get('/trip', [TripController::class, 'index'])->name('trip.index');
Route::get('/trip/create', [TripController::class, 'create'])->name('trip.create');
Route::post('/trip', [TripController::class, 'store'])->name('trip.store');
Route::get('/trip/{id}', [TripController::class, 'show'])->name('trip.show');

// Rute untuk Post (Beranda)
Route::get('/beranda', [PostController::class, 'index'])->name('beranda.index');
Route::get('/create', [PostController::class, 'create'])->name('beranda.create');
Route::post('/beranda', [PostController::class, 'store'])->name('beranda.store');

// Rute untuk melihat detail post pada beranda
Route::get('/beranda/{post}', function (Post $post) {
    if ($post->image) {
        $post->image = 'data:image/jpeg;base64,' . base64_encode($post->image);
    }
    if ($post->image1) {
        $post->image1 = 'data:image/jpeg;base64,' . base64_encode($post->image1);
    }
    if ($post->image2) {
        $post->image2 = 'data:image/jpeg;base64,' . base64_encode($post->image2);
    }
    if ($post->image3) {
        $post->image3 = 'data:image/jpeg;base64,' . base64_encode($post->image3);
    }
    return view('isi', ['title' => 'Single post', 'post' => $post]);
})->name('beranda.show');

// Rute untuk halaman admin yang menampilkan daftar wisata dengan fitur edit dan delete
Route::get('/editPost', [PostController::class, 'editPost'])->name('editPost');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Rute statis untuk halaman About
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

// Rute untuk halaman Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// Rute tambahan untuk test view
Route::get('/test', function () {
    return view('test', ['title' => 'Test']);
});

// Rute home setelah login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute autentikasi (aktifkan jika menggunakan fitur autentikasi Laravel)
// Auth::routes();
