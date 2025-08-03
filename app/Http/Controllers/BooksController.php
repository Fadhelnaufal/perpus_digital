<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Books;
use App\Models\BooksClass;
use App\Models\BooksShelf;
use Illuminate\Support\Str;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        $bookClasses = BooksClass::all();
        $bookShelfs  = BooksShelf::all();
        $books       = Books::all();

        return view('admin.books.index', compact('books', 'bookClasses', 'bookShelfs'));
    }

    public function create()
    {
        $bookClasses = BooksClass::all();
        $bookShelfs  = BooksShelf::all();

        return view('admin.books.add_books', compact('bookClasses', 'bookShelfs'));
    }


public function store(Request $request)
    {

        // Validate the request data
        // $request->validate([
        //     'title_books' => 'required|string|max:255',
        //     'author' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'pages' => 'required|integer',
        //     'publisher' => 'required|string|max:255',
        //     'year_published' => 'required|integer',
        //     'qty_books' => 'required|integer',
        //     'img_books' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'id_bookshelf' => 'required|exists:books_shelves,id_bookshelf',
        // ]);
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'pages' => 'required|numeric',
            'publisher' => 'required|string',
            'quantity' => 'required|numeric',
            'year_publish' => 'required|numeric',
            'category' => 'required|string',
        'bookshelf' => 'required|exists:books_shelves,id_bookshelf', // ✅ perbaiki di sini
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Generate ID
        $prefix = strtoupper(Str::substr($request->category, 0, 3));
        $lastBook = Books::where('code', 'like', "{$prefix}%")
                        ->orderBy('code', 'desc')
                        ->first();

        $newNumber = $lastBook
            ? (int) substr($lastBook->code, strlen($prefix)) + 1
            : 1;

        $newId = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        // Upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        Books::create([
            'code' => $newId,
            'title_books' => $request->title,
            'author' => $request->author,
            'img_books' => $imagePath,
            'description' => $request->description,
            'pages' => $request->pages,
            'publisher' => $request->publisher,
            'year_published' => $request->year_publish,
            'qty_books' => $request->quantity,
            'id_bookshelf' => $request->bookshelf,
            'id_book_class' => $request->book_class, // ✅ pastikan ini kolom kategori
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
    }




    public function generateId($id_class, $id_shelf)
{
    $bookClass = BooksClass::findOrFail($id_class);
    $prefix = strtoupper(Str::substr($bookClass->name, 0, 3));

    $latestBook = Books::where('code', 'like', $prefix . '%')->orderByDesc('code')->first();
    $lastNum = $latestBook ? intval(substr($latestBook->id_books, strlen($prefix))) : 0;
    $newId = $prefix . str_pad($lastNum + 1, 4, '0', STR_PAD_LEFT);

    return response()->json([
        'new_id' => $newId
    ]);
}


    public function edit(Books $book)
    {

        $bookClasses = BooksClass::all();
        $bookShelfs  = BooksShelf::all();

        return view('admin.books.edit_books', compact('book', 'bookClasses', 'bookShelfs'));
    }

    public function update(Request $request, $id)
{
    dd($request->all()); // Debugging line, remove in production
    $book = Books::findOrFail($id); // ✅ Sesuaikan nama model

    $validated = $request->validate([
        'title' => 'required|string',
        'author' => 'required|string',
        'description' => 'required|string',
        'pages' => 'required|integer',
        'publisher' => 'required|string',
        'quantity' => 'required|integer',
        'year_publish' => 'required|integer',
        'category' => 'required|string',
        'bookshelf' => 'required|exists:books_shelves,id_bookshelf',
        'book_class' => 'required|exists:books_classes,id_books_classes',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Update field teks
    $book->title_books     = $request->title;
    $book->author          = $request->author;
    $book->description     = $request->description;
    $book->pages           = $request->pages;
    $book->publisher       = $request->publisher;
    $book->year_published  = $request->year_publish;
    $book->qty_books       = $request->quantity;
    $book->id_bookshelf    = $request->bookshelf;
    $book->id_book_class   = $request->category; // ✅ pastikan ini kolom kategori


   if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($book->img_books && \Storage::exists('public/' . $book->img_books)) {
            \Storage::delete('public/' . $book->img_books);
        }

        // Upload baru
        $imagePath = $request->file('image')->store('books', 'public');
        $book->img_books = $imagePath;
    }

    $book->save();

    return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui.');
}


    public function destroy(Books $book)
    {
        // Implementasi destroy sesuai kebutuhan
        $book->delete();
        return back()->with('message', 'Buku berhasil dihapus.');
    }
}
