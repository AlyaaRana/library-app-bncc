<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('welcome');
});

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
