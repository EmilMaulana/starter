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
        Schema::table('biodatas', function (Blueprint $table) {
            $table->foreignId('jurusan_id')->nullable()->constrained()->onDelete('set null'); // Menambahkan kolom jurusan_id
            $table->foreignId('angkatan_id')->nullable()->constrained()->onDelete('set null'); // Menambahkan kolom angkatan_id
            $table->foreignId('kelas_id')->nullable()->constrained()->onDelete('set null'); // Menambahkan kolom kelas_id
        });
    }

    public function down()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn('jurusan_id');
            $table->dropForeign(['angkatan_id']);
            $table->dropColumn('angkatan_id');
            $table->dropForeign(['kelas_id']);
            $table->dropColumn('kelas_id');
        });
    }
};
