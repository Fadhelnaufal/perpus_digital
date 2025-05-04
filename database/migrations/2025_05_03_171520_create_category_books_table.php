<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_books', function (Blueprint $table) {
            $table->id();
            $table->string('id_books');
            $table->foreign('id_books')->references('id_books')->on('books')->onDelete('cascade');
// Foreign key reference to users table

            $table->string('id_book_class');
            $table->foreign('id_book_class')->references('id_books_classes')->on('books_classes')->onDelete('cascade'); // Foreign key reference to users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_books');
    }
};
