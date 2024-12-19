<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $guarded = ['id'];
    

    // Relasi dengan model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class); // Sesuaikan dengan relasi yang tepat
    }
}
