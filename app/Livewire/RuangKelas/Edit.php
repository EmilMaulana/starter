<?php

namespace App\Livewire\RuangKelas;

use Livewire\Component;
use App\Models\RuangKelas as ModelRuangKelas;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $nama_ruang, $kapasitas, $deskripsi, $kode_ruang;

    private function generateKodeRuangan()
    {
        do {
            // Generate kode acak dengan panjang 8 karakter
            $kode = 'RK-' . Str::random(3);
        } while (ModelRuangKelas::where('kode_ruang', $kode)->exists()); // Pastikan kode unik

        return $kode; // Kembalikan kode yang unik
    }

    public function render()
    {
        return view('livewire.ruang-kelas.edit');
    }
}
