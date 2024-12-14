<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        // Data kelas yang akan dimasukkan
        $kelas = [
            [
                'nama' => 'TKJ 1',
                'jurusan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'TKJ 2',
                'jurusan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'RPL 1',
                'jurusan_id' => 2, // ID jurusan Rekayasa Perangkat Lunak
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'RPL 2',
                'jurusan_id' => 2, // ID jurusan Rekayasa Perangkat Lunak
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'BDP 1',
                'jurusan_id' => 3, // ID jurusan Bisnis Daring dan Pemasaran
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'BDP 2',
                'jurusan_id' => 3, // ID jurusan Bisnis Daring dan Pemasaran
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'DG 1',
                'jurusan_id' => 4, // ID jurusan Desain Grafis
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'DG 2',
                'jurusan_id' => 4, // ID jurusan Desain Grafis
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'AK 1',
                'jurusan_id' => 5, // ID jurusan Akuntansi
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
            [
                'nama' => 'AK 2',
                'jurusan_id' => 5, // ID jurusan Akuntansi
                'angkatan_id' => 1, // ID jurusan Teknik Komputer dan Jaringan
            ],
        ];

        // Menyisipkan data ke dalam tabel kelas
        DB::table('kelas')->insert($kelas);
    }
}
