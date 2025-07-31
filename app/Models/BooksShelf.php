<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksShelf extends Model
{
    use HasFactory;

    protected $table = 'books_shelves';
    protected $primaryKey = 'id_bookshelf';
    public $incrementing = false; // <== WAJIB kalau pakai ID string
    protected $keyType = 'string'; // <== WAJIB biar Laravel tahu ini string

    protected $fillable = [
        'id_bookshelf',
        'name',
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
