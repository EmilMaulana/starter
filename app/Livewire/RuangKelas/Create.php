<?php

namespace App\Livewire\RuangKelas;

use Livewire\Component;
use App\Models\RuangKelas as ModelRuangKelas;
use Illuminate\Support\Str;

class Create extends Component
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

    public function store()
    {
        $this->validate([
            'nama_ruang' => 'required|string|max:255',
            'kapasitas' => 'required|numeric',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        // Generate kode kelas
        $kode = $this->generateKodeRuangan();

        ModelRuangKelas::create([
            'nama_ruang' => $this->nama_ruang,
            'kode_ruang' => $kode,
            'kapasitas' => $this->kapasitas,
            'deskripsi' => $this->deskripsi,
        ]);

        // Reset input fields
        $this->reset(['nama_ruang', 'kode_ruang', 'kapasitas', 'deskripsi']);

        // Optionally, you can emit an event or show a success message
        return redirect()->route('ruangan.index')->with('message', 'Data Ruang Kelas berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.ruang-kelas.create');
    }
}
