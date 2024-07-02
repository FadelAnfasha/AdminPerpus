<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\PublisherController;

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

    //Route card buku
    Route::get('/viewbook', [BookController::class, 'show'])->name('show-book');

    Route::get('/addbook', [BookController::class, 'create'])->name('create-book');
    Route::post('/store-book', [BookController::class, 'store'])->name('store-book');
    Route::get('/editbook/{id}', [BookController::class, 'edit'])->name('edit-book');
    Route::put('/updatebook/{id}', [BookController::class, 'update'])->name('update-book');
    Route::get('/deletebook/{id}', [BookController::class, 'destroy'])->name('delete-book');

    //Route card penulis
    Route::get('/viewauthor', [AuthorController::class, 'show'])->name('show-author');

    Route::get('/addauthor', [AuthorController::class, 'create'])->name('create-author');
    Route::post('/store-author', [AuthorController::class, 'store'])->name('store-author');
    Route::get('/editauthor/{id}', [AuthorController::class, 'edit'])->name('edit-author');
    Route::put('/updateauthor/{id}', [AuthorController::class, 'update'])->name('update-author');
    Route::delete('/deleteauthor/{id}', [AuthorController::class, 'destroy'])->name('delete-author');


    //Route card penerbit
    Route::get('/viewpublisher', [PublisherController::class, 'show'])->name('show-publisher');

    Route::get('/addpublisher', [PublisherController::class, 'create'])->name('create-publisher');
    Route::post('/store-publisher', [PublisherController::class, 'store'])->name('store-publisher');
    Route::get('/editpublisher/{id}', [PublisherController::class, 'edit'])->name('edit-publisher');
    Route::put('/updatepublisher/{id}', [PublisherController::class, 'update'])->name('update-publisher');
    Route::delete('/deletepublisher/{id}', [PublisherController::class, 'destroy'])->name('delete-publisher');

    //Route card rak buku
    Route::get('/viewbookshelf', [BookshelfController::class, 'show'])->name('show-bookshelf');

    Route::get('/addbookshelf', [BookshelfController::class, 'create'])->name('create-bookshelf');
    Route::post('/store-bookshelf', [BookshelfController::class, 'store'])->name('store-bookshelf');
    Route::get('/editbookshelf/{code}', [BookshelfController::class, 'edit'])->name('edit-bookshelf');
    Route::put('/updatebookshelf/{code}', [BookshelfController::class, 'update'])->name('update-bookshelf');
    Route::delete('/deletebookshelf/{code}', [BookshelfController::class, 'destroy'])->name('delete-bookshelf');

    //Route card anggota
    Route::get('/viewmember', [MemberController::class, 'show'])->name('show-member');

    Route::get('/addmember', [MemberController::class, 'create'])->name('create-member');
    Route::post('/store-member', [MemberController::class, 'store'])->name('store-member');
    Route::get('/editmember/{id}', [MemberController::class, 'edit'])->name('edit-member');
    Route::put('/updatemember/{id}', [MemberController::class, 'update'])->name('update-member');
    Route::delete('/member/{member}', [MemberController::class, 'destroy'])->name('delete-member');

    //Route card Peminjaman
    Route::get('/viewborrow', [BorrowingController::class, 'show'])->name('show-borrow');

    Route::get('/addborrow', [BorrowingController::class, 'create'])->name('create-borrow');
    Route::post('/store-borrow', [BorrowingController::class, 'store'])->name('store-borrow');
    Route::get('/detailborrow/{id}', [BorrowingController::class, 'detail'])->name('detail-borrow');
    Route::put('/updateborrow/{id}', [BorrowingController::class, 'update'])->name('update-borrow');
    Route::delete('/borrows/{borrow}', [BorrowingController::class, 'destroy'])->name('delete-borrow');
});

require __DIR__ . '/auth.php';
