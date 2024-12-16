<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use App\Models\Jurusan as ModelJurusan;
use App\Models\Angkatan as ModelAngkatan;
use App\Models\Kelas as ModelKelas;
use Illuminate\Support\Str;

class CreateKelas extends Component
{
    public $jurusan, $nama, $kode, $angkatan_id;
    public function mount(ModelJurusan $jurusan)
    {
        $this->jurusan = $jurusan;
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required|string|max:255',
            'angkatan_id' => 'required|exists:angkatans,id',
        ]);

        // Generate kode kelas
        $kode = $this->generateKodeKelas();

        // Simpan data kelas ke database
        ModelKelas::create([
            'nama' => $this->nama,
            'kode' => $kode, // Gunakan kode yang dihasilkan
            'angkatan_id' => $this->angkatan_id,
            'jurusan_id' => $this->jurusan->id, // Ambil ID jurusan dari objek jurusan
        ]);

        session()->flash('message', 'Kelas berhasil ditambahkan!');
        return redirect()->route('jurusan.kelas', ['jurusan' => $this->jurusan->slug]);
    }

    private function generateKodeKelas()
    {
        do {
            // Generate kode acak dengan panjang 8 karakter
            $kode = 'KLS-' . Str::random(6);
        } while (ModelKelas::where('kode', $kode)->exists()); // Pastikan kode unik

        return $kode; // Kembalikan kode yang unik
    }

    public function render()
    {
        return view('livewire.jurusan.create-kelas', [
            'angkatan' => ModelAngkatan::all(),
        ]);
    }
}
