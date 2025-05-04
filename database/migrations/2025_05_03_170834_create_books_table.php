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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('id_books')->unique();
            $table->string('title_books');
            $table->string('author');
            $table->string('img_books')->nullable();
            $table->string('description');
            $table->integer('pages');
            $table->string('publisher');
            $table->integer('year_published');
            $table->integer('qty_books');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
