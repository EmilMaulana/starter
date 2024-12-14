<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $guarded = ['id'];

    // Relasi dengan model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    // Relasi dengan model Siswa (Users)
    public function siswas()
    {
        return $this->hasMany(User::class, 'kelas_id');
    }

    // Relasi dengan model Angkatan
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }
}
