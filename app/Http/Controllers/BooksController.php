<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\BooksClass;
use App\Models\CategoryBook;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        // Fetch all book classes and book shelves
        $bookClasses = BooksClass::all();
        $bookShelfs = \App\Models\BooksShelf::all(); // Make sure you're using this variable name consistently

        // Pass both variables to the view
        return view('add_books', compact('bookClasses', 'bookShelfs'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        // Fetch all book classes and book shelves
        $bookClasses = BooksClass::all();
        $bookShelfs = \App\Models\BooksShelf::all();

        // Pass both variables to the view
        return view('add_books', compact('bookClasses', 'bookShelfs'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_books' => 'required|string|unique:books,id_books',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'pages' => 'required|integer',
            'publisher' => 'required',
            'year_publish' => 'required|integer',
            'quantity' => 'required|integer',
            'category' => 'required|exists:books_classes,id_books_classes',
            'bookshelf' => 'required|exists:books_shelves,id_bookshelf',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store image
        $imagePath = $request->file('image')->store('book_images', 'public');

        // ✅ Create the book
        $book = Books::create([
            'id_books' => $validated['id_books'],
            'title_books' => $validated['title'],
            'author' => $validated['author'],
            'description' => $validated['description'],
            'pages' => $validated['pages'],
            'publisher' => $validated['publisher'],
            'year_published' => $validated['year_publish'],
            'qty_books' => $validated['quantity'],
            'img_books' => $imagePath,
            'id_bookshelf' => $validated['bookshelf'], // ✅ Save bookshelf ID directly in books table
        ]);

        // ✅ Associate category with book
        CategoryBook::create([
            'id_books' => $book->id_books,
            'id_book_class' => $validated['category'],
        ]);

        return redirect()->route('books.create')->with('message', 'Book added successfully!');
    }
}
