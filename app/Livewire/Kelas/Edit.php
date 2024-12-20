<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Angkatan as ModelAngkatan;
use App\Models\Jurusan as ModelJurusan;
use App\Models\Kelas as ModelKelas;

class Edit extends Component
{
    public $kelas, $nama, $kode, $angkatan_id, $jurusan_id;

    public function mount($kelas)
    {
        $this->kelas = $kelas; // Simpan objek kelas
        $this->nama = $kelas->nama; // Ambil nama kelas
        $this->kode = $kelas->kode; // Ambil kode kelas
        $this->angkatan_id = $kelas->angkatan_id; // Ambil ID angkatan
        $this->jurusan_id = $kelas->jurusan_id; // Ambil ID angkatan

    }

    public function update()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required|string|max:255,' . $this->kelas->id,
            'angkatan_id' => 'required|exists:angkatans,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        // Cek apakah kode kelas sudah ada
        $kode = $this->kelas->kode; // Ambil kode yang sudah ada

        // Jika kode kosong, generate kode baru
        if (empty($kode)) {
            $kode = $this->generateKodeKelas();
        }

        // Update kelas
        $this->kelas->update([
            'nama' => $this->nama,
            'kode' => $kode,
            'angkatan_id' => $this->angkatan_id,
            'jurusan_id' => $this->jurusan_id,
        ]);

        session()->flash('message', 'Data Kelas berhasil diperbarui!');
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
        return view('livewire.kelas.edit', [
            'jurusan' => ModelJurusan::latest()->get(),
            'angkatan' => ModelAngkatan::latest()->get(),
        ]);
    }
}
