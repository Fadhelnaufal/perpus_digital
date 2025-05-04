<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BooksClass extends Model
{
    protected $table = 'books_classes';

    // Specify the fields that can be mass-assigned
    protected $fillable = ['id_books_classes', 'name'];
}
