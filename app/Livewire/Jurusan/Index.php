<?php

namespace App\Livewire\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class Index extends Component
{
    

    public function render()
    {
        $jurusan = Jurusan::with('kelas')
        ->latest()->get();
        return view('livewire.jurusan.index', [
            'jurusan' => $jurusan,
        ]);
    }
}
