<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    protected $guarded = ['id'];

    // Relasi dengan model MataPelajaran
    public function mapels()
    {
        return $this->hasMany(Mapel::class, 'jurusan_id');
    }


    // Relasi dengan model Kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'jurusan_id');
    }
}
