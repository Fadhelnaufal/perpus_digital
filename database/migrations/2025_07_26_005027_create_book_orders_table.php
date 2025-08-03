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

    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

    $table->string('code_books');
    $table->foreign('code_books')->references('code')->on('books')->onDelete('cascade');

    $table->integer('qty_books');
    $table->string('id_books_class');
    $table->date('order_date');
    $table->date('return_date');
    $table->integer('period');

    $table->unsignedBigInteger('id_penalty')->nullable();
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
