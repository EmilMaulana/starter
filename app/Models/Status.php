<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $guarded = 'id';

    public function biodatas()
    {
        return $this->hasMany(Biodata::class);
    }
}
