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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('id_admin')->unique();
            $table->foreignId('id_user')->constrained('users')->references('id')->unique(); // Foreign key reference to users table
            $table->string('name');
            $table->string('address_admin');
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
