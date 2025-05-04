    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class BooksShelf extends Model
    {
        use HasFactory;


        protected $fillable = [
            'id_bookshelf',
            'name',
        ];
        // BooksShelf.php
    protected $primaryKey = 'id_bookshelf';
    public $incrementing = true; // or false if needed

    // optional table name
    protected $table = 'books_shelves';

        public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    }
