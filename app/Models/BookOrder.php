<?php

namespace App\Models;
use App\Models\BooksOrder; // ✅ bukan BookOrder
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    protected $table = 'book_orders';

    protected $primaryKey = 'id_order';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',         // disesuaikan agar match dengan kolom relasi
        'code_books',
        'qty_books',
        'status',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Kolom di tabel book_orders = id_user
    }

    // Relasi ke Books berdasarkan kode buku, bukan ID
    public function book()
    {
       return $this->belongsTo(Books::class, 'code_books', 'code');
        // 'code_books' adalah FK di tabel ini, 'code' adalah unique key di tabel books
    }
}
