<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data jurusan yang akan dimasukkan
        $jurusans = [
            ['nama' => 'Teknik Komputer dan Jaringan'],
            ['nama' => 'Rekayasa Perangkat Lunak'],
            ['nama' => 'Teknik Kendaraan Ringan Otomotif'],
            ['nama' => 'Seni Karawitan'],
            ['nama' => 'Akuntansi'],
        ];

        // Menyisipkan data ke dalam tabel jurusan
        DB::table('jurusans')->insert($jurusans);
    }
}
