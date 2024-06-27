<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/viewbook', [BookController::class, 'show'])->name('show-book');

    Route::get('/addbook', [BookController::class, 'create'])->name('create-book');
    Route::post('/store-book', [BookController::class, 'store'])->name('store-book');
    Route::get('/editbook/{id}', [BookController::class, 'edit'])->name('edit-book');
    Route::put('/updatebook/{id}', [BookController::class, 'update'])->name('update-book');
    Route::get('/deletebook/{id}', [BookController::class, 'destroy'])->name('delete-book');
});

require __DIR__ . '/auth.php';
