<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BooksClassController;
use App\Http\Controllers\BooksShelfController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookOrderController;
use Illuminate\Support\Facades\Auth;

// Display the form to create a new book class
// Route::get('/books-classes/create', [BooksClassController::class, 'index'])->name('add_books_class');

// Resource route for BooksClassController (handles index, create, store, etc.)
// Add this line:
// Route::resource('books-classes', BooksClassController::class);
// Route::resource('books', BooksController::class);
// Route::resource('books-shelf', BooksShelfController::class);
// Route::resource('inventory', InventoryController::class);


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);
     Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
    // Route::get('/users', [AdminController::class, 'listUsers'])->name('users.index');
    // Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    // Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    // Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

    // Route::resource('books', BooksController::class);
    // Route::get('books/generate-id/{id_class}/{id_shelf}', [BooksController::class, 'generateId'])->name('books.generateId');
    // Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
    // Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');


    Route::resource('books-classes', BooksClassController::class);
    Route::resource('books-shelf', BooksShelfController::class);
});



Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
    Route::get('/book-orders', [BookOrderController::class, 'index'])->name('book-orders.index');
    Route::get('/book-orders/create', [BookOrderController::class, 'createBookOrder'])->name('book-orders.create');
    Route::post('/book-orders', [BookOrderController::class, 'store'])->name('book-orders.store');
    // Route::get('/book-orders/{order}/edit', [BookOrderController::class, 'edit'])->name('book-orders.edit');
    // Route::put('/book-orders/{order}', [BookOrderController::class, 'update'])->name('book-orders.update');
    // Route::delete('/book-orders/{order}', [BookOrderController::class, 'destroy'])->name('book-orders.destroy');
});

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'index'])->name('dashboard');
    Route::get('/book-orders', [BookOrderController::class, 'index'])->name('book-orders.index');
    Route::get('/book-orders/create', [BookOrderController::class, 'createBookOrder'])->name('book-orders.create');
    Route::post('/book-orders', [BookOrderController::class, 'store'])->name('book-orders.store');
    // Route::get('/book-orders/{order}/edit', [BookOrderController::class, 'edit'])->name('book-orders.edit');
    // Route::put('/book-orders/{order}', [BookOrderController::class, 'update'])->name('book-orders.update');
    // Route::delete('/book-orders/{order}', [BookOrderController::class, 'destroy'])->name('book-orders.destroy');
});


