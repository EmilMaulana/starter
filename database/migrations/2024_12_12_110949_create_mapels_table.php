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
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // Kode unik untuk mata pelajaran
            $table->string('nama'); // Nama mata pelajaran
            $table->text('deskripsi')->nullable(); // Deskripsi mata pelajaran (opsional)
            $table->integer('jam'); // Jumlah jam pelajaran
            $table->string('semester'); // Semester di mana mata pelajaran diajarkan
            $table->foreignId('jurusan_id'); // ID jurusan yang menawarkan mata pelajaran
            $table->enum('jenis', ['teori', 'praktik', 'teori dan praktik']); // Jenis mata pelajaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
