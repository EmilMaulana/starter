<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AngkatanSeeder extends Seeder
{
    public function run()
    {
        // Data angkatan yang akan dimasukkan
        $angkatan = [
            ['tahun' => 2023],
            ['tahun' => 2024],
        ];

        // Menyisipkan data ke tabel angkatan
        DB::table('angkatans')->insert($angkatan);
    }
}
