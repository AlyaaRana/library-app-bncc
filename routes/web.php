<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Library System Routes
|--------------------------------------------------------------------------
*/

// Books
Route::resource('books', BookController::class);

// Categories
Route::resource('categories', CategoryController::class);

// Members
Route::resource('members', MemberController::class);

// Borrowings
Route::resource('borrowings', BorrowingController::class);
