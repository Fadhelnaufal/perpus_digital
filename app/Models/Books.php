<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'id_books';
    public $incrementing = false;
    protected $keyType = 'string';

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
        'id_bookshelf'
    ];
}
