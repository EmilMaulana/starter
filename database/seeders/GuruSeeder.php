<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    public function run()
    {
        // Contoh data guru
        $guruData = [
            [
                'name' => 'Budi Santoso',
                'role_id' => '6',
                'email' => 'budi.santoso@example.com',
                'password' => 'password123', // Ganti dengan password yang lebih aman
                'nip' => '1234567890',
                'jabatan' => 'Guru Matematika',
                'alamat' => 'Jl. Pendidikan No. 1',
                'nohp' => '081234567890',
                'jeniskelamin' => 'Laki-laki',
            ],
            [
                'name' => 'Siti Aminah',
                'role_id' => '6',
                'email' => 'siti.aminah@example.com',
                'password' => 'password123', // Ganti dengan password yang lebih aman
                'nip' => '0987654321',
                'jabatan' => 'Guru Bahasa Inggris',
                'alamat' => 'Jl. Kebudayaan No. 2',
                'nohp' => '082345678901',
                'jeniskelamin' => 'Perempuan',
            ],
            // Tambahkan lebih banyak data guru sesuai kebutuhan
        ];

        foreach ($guruData as $data) {
            // Buat pengguna baru
            $user = User::create([
                'role_id' => $data['role_id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Buat data guru terkait
            Guru::create([
                'user_id' => $user->id,
                'nip' => $data['nip'],
                'jabatan' => $data['jabatan'],
                'alamat' => $data['alamat'],
                'nohp' => $data['nohp'],
                'jeniskelamin' => $data['jeniskelamin'],
            ]);
        }
    }
}
