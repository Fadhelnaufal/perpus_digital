<?php

namespace App\Http\Controllers;

use App\Models\BooksClass;
use Illuminate\Http\Request;

class BooksClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.books-classes.index', [
            'bookClasses' => BooksClass::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books-classes.create', [
            'bookClasses' => BooksClass::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'id_books_classes' => 'required|unique:books_classes',
        'name' => 'required|string|max:255',
    ]);

    $class = new BooksClass();
    $class->id_books_classes = $request->id_books_classes;
    $class->name = $request->name;
    $class->save();

    return redirect()->route('admin.books-classes.index')->with('success', 'Book class created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(BooksClass $booksClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BooksClass $booksClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BooksClass $booksClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BooksClass $booksClass)
    {
        //
    }
}
