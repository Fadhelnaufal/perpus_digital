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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('id_students')->unique(); // Unique identifier for students (NIS/NISN)
            $table->foreignId('id_user')->constrained('users')->references('id')->unique(); // Foreign key reference to users table
            $table->string('name'); 
            $table->string('class');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('address_students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
