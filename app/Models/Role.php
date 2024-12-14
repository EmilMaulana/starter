<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles'; // Nama tabel yang digunakan

    protected $guarded = [
        'id', // Kolom yang dapat diisi
    ];

    // Relasi dengan model User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id'); // Satu role dapat dimiliki oleh banyak pengguna
    }
}
