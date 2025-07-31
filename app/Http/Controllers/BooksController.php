<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\BooksClass;
use App\Models\BooksShelf;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'nullable',
        'pages' => 'required|integer',
        'publisher' => 'required',
        'quantity' => 'required|integer',
        'year_publish' => 'required|integer',
        'category' => 'required',
        'bookshelf' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    // 1. Ambil kode prefix dari BooksClass (misal 'BIO' atau 'BJW')
    $bookClass = \App\Models\BooksClass::findOrFail($request->category);
    $prefix = strtoupper($bookClass->code); // pastikan ada kolom 'code' seperti 'BIO'

    // 2. Cari ID terakhir untuk kategori ini
    $lastBookId = CategoryBook::where('id_book_class', $request->category)
        ->join('books', 'category_books.id_books', '=', 'books.id_books')
        ->orderBy('books.id_books', 'desc')
        ->pluck('books.id_books')
        ->first();

    // 3. Hitung angka terakhir dan generate ID baru
    if ($lastBookId && strpos($lastBookId, $prefix) === 0) {
        $number = (int)substr($lastBookId, strlen($prefix)) + 1;
    } else {
        $number = 1;
    }
    $newId = $prefix . str_pad($number, 4, '0', STR_PAD_LEFT);

    // 4. Simpan gambar jika ada
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    // 5. Simpan ke tabel books
    $book = new Books();
    $book->id_books = $newId;
    $book->title_books = $request->title;
    $book->author = $request->author;
    $book->description = $request->description;
    $book->pages = $request->pages;
    $book->publisher = $request->publisher;
    $book->year_published = $request->year_publish;
    $book->qty_books = $request->quantity;
    $book->img_books = $imageName;
    $book->id_bookshelf = $request->bookshelf;
    $book->save();

    // 6. Simpan relasi ke tabel category_books
    CategoryBook::create([
        'id_books' => $newId,
        'id_book_class' => $request->category,
        'id_bookshelf' => $request->bookshelf
    ]);

    return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
}



    public function generateId($id_class, $id_shelf)
{
    $bookClass = BooksClass::findOrFail($id_class);
    $prefix = strtoupper(Str::substr($bookClass->name, 0, 3));

    $latestBook = Books::where('id_books', 'like', $prefix . '%')->orderByDesc('id_books')->first();
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

    public function update(Request $request, Books $book)
    {
        // Implementasi update sesuai kebutuhan (opsional)
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return back()->with('message', 'Buku berhasil dihapus.');
    }
}
