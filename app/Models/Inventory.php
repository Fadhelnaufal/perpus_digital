<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'id_books',
        'id_books_shelves',
        'qty_books',
    ];

    // Relationship with the Books model
    public function book()
    {
        return $this->belongsTo(Books::class, 'id_books', 'id_books');
    }

    // Relationship with the BooksShelf model
    public function shelf()
    {
        return $this->belongsTo(BooksShelf::class, 'id_books_shelves', 'id_bookshelf');
    }
}

