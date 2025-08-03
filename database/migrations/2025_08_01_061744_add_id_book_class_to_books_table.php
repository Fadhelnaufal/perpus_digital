<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('books', function (Blueprint $table) {
        $table->string('id_book_class')->nullable();
        // Tambahkan foreign key constraint
        $table->foreign('id_book_class')->references('id_books_classes')->on('books_classes')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropForeign(['id_book_class']);
        $table->dropColumn('id_book_class');
    });
}

};
