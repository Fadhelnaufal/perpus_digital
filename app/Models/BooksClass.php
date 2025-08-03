<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BooksClass extends Model
{

    protected $table = 'books_classes';
    protected $primaryKey = 'id_books_classes';
    public $incrementing = false; // Use false if the primary key is not an auto-incrementing integer
    protected $keyType = 'string'; // Use 'string' if the primary key is a string   
    // Specify the fields that can be mass-assigned
    protected $fillable = ['id_books_classes', 'name'];
}
