<?php

namespace App\Livewire\RuangKelas;

use App\Models\RuangKelas;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.ruang-kelas.index', [
            'ruangkelas' => RuangKelas::latest()->get()
        ]);
    }
}
