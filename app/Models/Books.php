<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'id_books',
        'title_books',
        'author',
        'description',
        'pages',
        'publisher',
        'year_published',
        'qty_books',
        'img_books',
    ];
    // Books.php
protected $primaryKey = 'id_books';
public $incrementing = true; // or false if it's not auto-increment

// optional: if table name is custom
protected $table = 'books';


//     public function category()
// {
//     return $this->belongsTo(BooksClass::class, 'id_books_class', 'id_books_classes');
// }

}
