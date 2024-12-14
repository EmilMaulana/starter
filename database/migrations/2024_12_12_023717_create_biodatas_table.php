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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key untuk relasi dengan tabel users
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('agama')->nullable();
            $table->enum('jeniskelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->text('ttl')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
