<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Biodata;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Mengambil NIS dan NISN dari baris yang diimpor
        $nis = $row[1]; // NIS
        $nisn = $row[2]; // NISN
        $email = "{$nis}@siakad.com"; // Format email
        $password = bcrypt($nis); // Menghasilkan password dari NIS

        // Membuat user baru
        $user = User::create([
            'name' => $row[0], // Nama lengkap
            'email' => $email, // Email yang dihasilkan
            'password' => $password, // Password yang dihasilkan
        ]);

        // Menyimpan biodata
        Biodata::create([
            'user_id' => $user->id, // Mengaitkan biodata dengan user
            'nis' => $nis, // NIS
            'nisn' => $nisn, // NISN
        ]);

        return $user; // Mengembalikan user yang baru dibuat
    }
}
