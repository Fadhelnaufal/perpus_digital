<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Books;
use App\Models\BooksShelf;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // Eager load books and shelves
        $inventories = Inventory::with(['book', 'shelf'])->get();

        return view('inventory', compact('inventories'));
    }

    public function create()
    {
        $books = Books::all();
        $bookshelves = BooksShelf::all();

        return view('inventory.create', compact('books', 'bookshelves'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_books' => 'required|exists:books,id_books',
            'id_books_shelves' => 'required|exists:books_shelves,id_bookshelf',
            'qty_books' => 'required|integer|min:1',
        ]);

        Inventory::create([
            'id_books' => $validated['id_books'],
            'id_books_shelves' => $validated['id_books_shelves'],
            'qty_books' => $validated['qty_books'],
        ]);

        return redirect()->route('inventory.index')->with('message', 'Inventory added successfully!');
    }

    public function edit(Inventory $inventory)
    {
        $books = Books::all();
        $bookshelves = BooksShelf::all();

        return view('inventory.edit', compact('inventory', 'books', 'bookshelves'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'id_books' => 'required|exists:books,id_books',
            'id_books_shelves' => 'required|exists:books_shelves,id_bookshelf',
            'qty_books' => 'required|integer|min:1',
        ]);

        $inventory->update([
            'id_books' => $validated['id_books'],
            'id_books_shelves' => $validated['id_books_shelves'],
            'qty_books' => $validated['qty_books'],
        ]);

        return redirect()->route('inventory.index')->with('message', 'Inventory updated successfully!');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.index')->with('message', 'Inventory deleted successfully!');
    }
}
