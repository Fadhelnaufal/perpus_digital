<?php

namespace App\Http\Controllers;

use App\Models\BooksShelf;
use Illuminate\Http\Request;

class BooksShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('add_books_shelf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_bookshelf' => 'required|unique:books_shelves',
            'name' => 'required|string|max:255',
        ]);

        $shelf = new BooksShelf();
        $shelf->id_bookshelf = $request->id_bookshelf;
        $shelf->name = $request->name;
        $shelf->save();

        return redirect()->route('books-shelf.index')->with('message', 'Bookshelf added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BooksShelf $booksShelf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BooksShelf $booksShelf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BooksShelf $booksShelf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BooksShelf $booksShelf)
    {
        //
    }
}
