<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(AngkatanSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(GuruSeeder::class);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])->each(function ($user) {
            $user->biodata()->create([
                'nis' => '123456',
                'nisn' => '9876543210',
                'agama' => 'Islam',
                'jeniskelamin' => 'Laki-laki',
                'ttl' => '2000-01-01',
                'alamat' => 'Jl. Contoh Alamat',
                'nohp' => '08123456789',
                'jurusan_id' => 1,
                'angkatan_id' => 1,
                'kelas_id' => 1,
            ]);
        });
    }
}
