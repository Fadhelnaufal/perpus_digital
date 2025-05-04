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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->string('id_books');
            $table->foreign('id_books')
                ->references('id_books')
                ->on('books')
                ->onDelete('cascade');

            $table->string('id_bookshelf');  // match books_shelves PK
            $table->foreign('id_bookshelf')
                ->references('id_bookshelf')
                ->on('books_shelves')
                ->onDelete('cascade');

            $table->integer('qty_books');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
