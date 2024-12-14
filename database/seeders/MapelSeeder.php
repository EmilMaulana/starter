<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    public function run()
    {
        // Data mata pelajaran yang akan dimasukkan
        $mapels = [
            [
                'kode' => 'TKJ101',
                'nama' => 'Dasar-Dasar Jaringan',
                'deskripsi' => 'Pengenalan jaringan komputer dan konsep dasar.',
                'jam' => 3,
                'semester' => 'Ganjil',
                'jurusan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
                'jenis' => 'Teori dan Praktik',
            ],
            [
                'kode' => 'RPL101',
                'nama' => 'Pemrograman Dasar',
                'deskripsi' => 'Dasar-dasar pemrograman menggunakan bahasa pemrograman.',
                'jam' => 3,
                'semester' => 'Genap',
                'jurusan_id' => 2, // ID jurusan Rekayasa Perangkat Lunak
                'jenis' => 'Teori dan Praktik',
            ],
            [
                'kode' => 'TBS101',
                'nama' => 'Dasar-Dasar Bisnis',
                'deskripsi' => 'Pengenalan dunia bisnis dan konsep dasar.',
                'jam' => 3,
                'semester' => 'Ganjil',
                'jurusan_id' => 3, // ID jurusan Bisnis Daring dan Pemasaran
                'jenis' => 'Teori',
            ],
            [
                'kode' => 'DG101',
                'nama' => 'Desain Grafis',
                'deskripsi' => 'Pengenalan desain grafis dan alat-alatnya.',
                'jam' => 3,
                'semester' => 'Genap',
                'jurusan_id' => 4, // ID jurusan Desain Grafis
                'jenis' => 'Teori dan Praktik',
            ],
            [
                'kode' => 'AK101',
                'nama' => 'Akuntansi Dasar',
                'deskripsi' => 'Dasar-dasar akuntansi dan laporan keuangan.',
                'jam' => 3,
                'semester' => 'Ganjil',
                'jurusan_id' => 5, // ID jurusan Akuntansi
                'jenis' => 'Teori',
            ],
        ];

        // Menyisipkan data ke dalam tabel mapels
        DB::table('mapels')->insert($mapels);
    }
}
