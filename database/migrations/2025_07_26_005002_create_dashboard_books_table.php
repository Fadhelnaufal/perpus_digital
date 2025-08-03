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
        Schema::create('dashboard_books', function (Blueprint $table) {
            $table->id();
            $table->string('code_books');
            $table->foreign('code_books')->references('code')->on('books')->onDelete('cascade'); // Foreign key reference to users table
            $table->string('title_books');
            $table->string('author');
            $table->string('img_books')->nullable();
            $table->string('description');
            $table->string('pages');
            $table->string('publisher');
            $table->string('year_published');
            $table->integer('qty_books')->constrained('inventories')->references('qty_books'); // Foreign key reference to users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_books');
    }
};
