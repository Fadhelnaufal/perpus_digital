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
use Illuminate\Support\Facades\Auth;

// Display the form to create a new book class
Route::get('/books-classes/create', [BooksClassController::class, 'index'])->name('add_books_class');

// Resource route for BooksClassController (handles index, create, store, etc.)
// Add this line:
// Route::resource('books-classes', BooksClassController::class);
// Route::resource('books', BooksController::class);
Route::resource('books-shelf', BooksShelfController::class);
Route::resource('inventory', InventoryController::class);


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'listUsers'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/admin/books/generate-id/{id_class}/{id_shelf}', [BooksController::class, 'generateId']);
    Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
   Route::resource('books-classes', BooksClassController::class);
    Route::post('/users', [AdminController::class, 'store'])->name('users.store');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    route::resource('books-shelf', BooksShelfController::class);
});

Route::middleware(['auth', 'role:teacher'])->group(function() {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

Route::middleware(['auth', 'role:student'])->group(function() {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});

