<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryBook extends Model
{
   use HasFactory;

   protected $fillable = [
    'code',
    'id_book_class',
    'id_bookshelf',
   ];

}
