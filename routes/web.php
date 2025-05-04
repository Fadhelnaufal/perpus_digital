<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BooksClassController;
use App\Http\Controllers\BooksShelfController;

// Display the form to create a new book class
Route::get('/books-classes/create', [BooksClassController::class, 'index'])->name('add_books_class');

// Resource route for BooksClassController (handles index, create, store, etc.)
// Add this line:
Route::resource('books-classes', BooksClassController::class);
Route::resource('books', BooksController::class);
Route::resource('books-shelf', BooksShelfController::class);
Route::resource('inventory', InventoryController::class);

