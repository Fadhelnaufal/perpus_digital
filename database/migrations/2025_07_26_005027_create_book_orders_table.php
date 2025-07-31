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
        Schema::create('book_orders', function (Blueprint $table) {
            $table->id();
            $table->string('id_students');
            $table->foreign('id_students')->references('id_students')->on('students')->onDelete('cascade');// Foreign key reference to users table

            $table->string('id_books');
            $table->foreign('id_books')->references('id_books')->on('books')->onDelete('cascade'); // Foreign key reference to users table
            $table->integer('qty_books');
            $table->string('id_books_class');
            $table->date('order_date');
            $table->date('return_date');
            $table->integer('period');

            $table->unsignedBigInteger('id_penalty');
            $table->foreign('id_penalty')->references('id')->on('penaltys')->onDelete('cascade');

           $table->foreignId('approve_by')->nullable()->constrained('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_orders');
    }
};
