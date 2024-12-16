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
            ['nama' => 'Teknik Komputer dan Jaringan', 'slug' => 'teknik-komputer-dan-jaringan'],
            ['nama' => 'Rekayasa Perangkat Lunak', 'slug' => 'rekayasa-perangkat-lunak'],
            ['nama' => 'Teknik Kendaraan Ringan Otomotif', 'slug' => 'teknik-kendaraan-ringan-otomotif'],
            ['nama' => 'Seni Karawitan', 'slug' => 'seni-karawitan'],
            ['nama' => 'Akuntansi', 'slug' => 'akuntansi'],
        ];

        // Menyisipkan data ke dalam tabel jurusan
        DB::table('jurusans')->insert($jurusans);
    }
}
