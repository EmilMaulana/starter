<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    public function run()
    {   
        $kelas = [
            [
                'nama' => 'TKJ 1',
                'jurusan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
                'kode' => 'KLS' . Str::random(4), // Menggunakan str_random untuk menghasilkan kode acak
            ],
            [
                'nama' => 'TKJ 2',
                'jurusan_id' => 1,
                'angkatan_id' => 1,
                'kode' => 'KLS' . Str::random(4), // Menggunakan str_random untuk menghasilkan kode acak
            ]
        ];
        
        // Menyisipkan data ke dalam tabel kelas
        DB::table('kelas')->insert($kelas);
    }
}
