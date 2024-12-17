<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Mengambil NIP dan Nama Lengkap dari baris yang diimpor
        // Pastikan baris pertama (header) diabaikan saat mengimpor
        if ($row[0] === 'Nama Lengkap' && $row[1] === 'NIP') {
            return null; // Mengabaikan baris header
        }

        $name = $row[0]; // Nama Lengkap berada di kolom pertama
        $nip = $row[1]; // NIP berada di kolom kedua

        // Membuat email dari NIP
        $email = strtolower($nip) . '@siakad.com'; // Format email
        $password = bcrypt($nip); // Menghasilkan password dari NIP
        $role_id = 6; // Role_id yang sesuai (Guru)

        // Membuat user baru
        $user = User::create([
            'name' => $name, // Nama lengkap
            'email' => $email, // Email yang dihasilkan
            'password' => $password, // Password yang dihasilkan
            'role_id' => $role_id, // Menetapkan role_id (Guru)
        ]);

        // Menyimpan data guru
        Guru::create([
            'user_id' => $user->id, // Mengaitkan biodata dengan user
            'nip' => $nip, // NIP
        ]);

        return $user; // Mengembalikan user yang baru dibuat
    }

}
