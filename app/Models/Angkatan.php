<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $guarded = ['id'];

    // Relasi dengan model Kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
