<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('id_bookshelf')->after('qty_books');

            // Tambahkan foreign key constraint
            $table->foreign('id_bookshelf')->references('id_bookshelf')->on('books_shelves')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['id_bookshelf']);
            $table->dropColumn('id_bookshelf');
        });
    }
};
