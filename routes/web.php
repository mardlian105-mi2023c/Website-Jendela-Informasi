<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('news', NewsController::class);
Route::get('/berita', [NewsController::class, 'berita'])->name('berita');
Route::get('/berita/kategori/{id}', [NewsController::class, 'kategori'])->name('berita.kategori');
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->name('user.')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});

Route::post('/news/{news}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('auth')
    ->name('comments.destroy');

require __DIR__.'/auth.php';