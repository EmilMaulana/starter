<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $guarded = ['id'];

    // Relasi ke model Guru
    

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
