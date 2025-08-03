<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

   protected $fillable = [
    'code',
    'title_books',
    'author',
    'description',
    'pages',
    'publisher',
    'year_published',
    'qty_books',
    'img_books',
    'id_bookshelf',
    'id_book_class', // pastikan ini kolom kategori
];



}
