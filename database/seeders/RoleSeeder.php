<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Data role yang akan dimasukkan
        $roles = [
            ['nama' => 'superadmin'],
            ['nama' => 'kepsek'],
            ['nama' => 'tu'],
            ['nama' => 'wakasek'],
            ['nama' => 'kajur'],
            ['nama' => 'guru'],
            ['nama' => 'siswa'],
        ];

        // Menyisipkan data ke dalam tabel roles
        DB::table('roles')->insert($roles);
    }
}
