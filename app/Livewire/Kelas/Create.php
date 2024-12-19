<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Angkatan;
use App\Models\Kelas as ModelKelas; // Pastikan Anda mengimpor model Kelas
use Illuminate\Support\Str;

class Create extends Component
{
    public $jurusan, $angkatan, $nama, $kode, $angkatan_id, $jurusan_id;

    public function mount()
    {
        // Ambil semua jurusan dan angkatan dari database
        $this->jurusan = Jurusan::latest()->get(); // Pastikan ini tidak null
        $this->angkatan = Angkatan::latest()->get(); // Pastikan ini tidak null
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required|string|max:255',
            'angkatan_id' => 'required|exists:angkatans,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        // Generate kode kelas
        $kode = $this->generateKodeKelas();

        // Simpan data kelas ke database
        ModelKelas::create([
            'nama' => $this->nama,
            'kode' => $kode, // Gunakan kode yang dihasilkan
            'angkatan_id' => $this->angkatan_id,
            'jurusan_id' => $this->jurusan_id, // Ambil ID jurusan dari objek jurusan
        ]);

        session()->flash('message', 'Data Kelas berhasil ditambahkan!');
        return redirect()->route('kelas.index');
    }

    private function generateKodeKelas()
    {
        do {
            // Generate kode acak dengan panjang 8 karakter
            $kode = 'KLS' . Str::random(4);
        } while (ModelKelas::where('kode', $kode)->exists()); // Pastikan kode unik

        return $kode; // Kembalikan kode yang unik
    }

    public function render()
    {
        return view('livewire.kelas.create');
    }

}
