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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('book_orders')->onDelete('cascade');// Foreign key reference to users table

            $table->string('id_books');
            $table->foreign('id_books')->references('id_books')->on('inventories')->onDelete('cascade'); // Foreign key reference to users table


            $table->foreignId('id_category')->constrained('category_books')->references('id')->onDelete('cascade'); // Foreign key reference to users table

            $table->date('order_date');
            $table->date('return_date');


            $table->unsignedBigInteger('penaltys');
            $table->foreign('penaltys')
                  ->references('id')
                  ->on('penaltys')
                  ->onDelete('cascade');


            $table->string('order_by');
            $table->foreign('order_by')->references('id_students')->on('students'); // Foreign key reference to users table

            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
