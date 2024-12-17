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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->string('nip', 20)->unique(); // Nomor Induk Pegawai (unik)
            $table->string('jabatan')->nullable(); // Jabatan guru (opsional)
            $table->string('alamat')->nullable(); // Alamat guru (opsional)
            $table->string('nohp')->nullable(); // Nomor telepon (opsional)
            $table->enum('jeniskelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
