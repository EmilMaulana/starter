<?php

namespace App\Imports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class MapelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (
            trim($row[0]) === 'Nama Mata Pelajaran' && 
            trim($row[1]) === 'Jam' && 
            trim($row[2]) === 'Semester' && 
            trim($row[3]) === 'Jenis'
        ) {
            return null; // Abaikan baris header
        }
    
        // Validasi kolom 'jam' untuk memastikan itu adalah angka
        if (!is_numeric($row[1])) {
            throw new \Exception("Kolom 'Jam' harus berupa angka. Nilai ditemukan: {$row[1]}");
        }

        $nama = $row[0]; 
        $jam = $row[1]; 
        $semester = $row[2]; 
        $jenis = $row[3]; 

        // Generate kode secara otomatis dengan awalan "MP" dan 3 karakter acak
        do {
            $kode = 'MP' . Str::random(3); // Menghasilkan kode dengan awalan "MP" dan 3 karakter acak
        } while (Mapel::where('kode', $kode)->exists()); // Cek apakah kode sudah ada

        // Membuat user baru
        $mapel = mapel::create([
            'nama' => $nama, 
            'kode' => $kode, 
            'jam' => $jam, 
            'semester' => $semester, 
            'jenis' => $jenis,
            'jurusan_id' => '1',
        ]);

        return $mapel; // Mengembalikan user yang baru dibuat
    }
}
