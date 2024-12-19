<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use App\Models\Angkatan as ModelAngkatan;
use App\Models\Kelas as ModelKelas;
use Illuminate\Support\Str;

class EditKelas extends Component
{
    public $jurusan, $kelas, $nama, $kode, $angkatan_id;

    public function mount($jurusan, $kelas)
    {
        $this->jurusan = $jurusan; // Simpan objek jurusan
        $this->kelas = $kelas; // Simpan objek kelas
        $this->nama = $kelas->nama; // Ambil nama kelas
        $this->kode = $kelas->kode; // Ambil kode kelas
        $this->angkatan_id = $kelas->angkatan_id; // Ambil ID angkatan

    }

    public function update()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required|string|max:255|unique:kelas,nama,' . $this->kelas->id,
            'angkatan_id' => 'required|exists:angkatans,id',
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
        ]);

        session()->flash('message', 'Kelas berhasil diperbarui!');
        return redirect()->route('jurusan.kelas', ['jurusan' => $this->jurusan->slug]);
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
        return view('livewire.jurusan.edit-kelas', [
            'angkatan' => ModelAngkatan::all(),
        ]);
    }
}
