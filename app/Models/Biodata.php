<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    // protected $table = 'biodatas';

    protected $guarded = [
        'id'
    ];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'angkatan_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
