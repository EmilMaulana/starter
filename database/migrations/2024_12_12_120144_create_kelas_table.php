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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama kelas, misalnya "Kelas 10A"
            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade'); // ID jurusan yang terkait
            $table->foreignId('angkatan_id')->nullable()->constrained('angkatans')->onDelete('cascade'); // ID jurusan yang terkait
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};