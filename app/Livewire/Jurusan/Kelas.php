<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use App\Models\Jurusan as ModelJurusan;
use App\Models\Kelas as ModelKelas; // Pastikan Anda mengimpor model Kelas
use App\Models\Angkatan as ModelAngkatan; // Pastikan Anda mengimpor model Angkatan

class Kelas extends Component
{
    public $jurusan;
    public $jurusanId;
    public $angkatanId; // Properti untuk menyimpan ID angkatan yang dipilih
    public $nama;
    public $kode;
    public $slug;

    public function mount(ModelJurusan $jurusan)
    {
        $this->jurusan = $jurusan;
        $this->jurusanId = $jurusan->id; // Simpan ID jurusan
        $this->nama = $jurusan->nama;
        $this->kode = $jurusan->kode;
        $this->slug = $jurusan->slug;
        $this->angkatanId = null; // Inisialisasi ID angkatan
    }

    public function render()
    {
        // Ambil kelas yang terkait dengan jurusan dan angkatan yang dipilih
        $kelas = ModelKelas::with('angkatan')
            ->where('jurusan_id', $this->jurusanId)
            ->when($this->angkatanId, function ($query) {
                return $query->where('angkatan_id', $this->angkatanId);
            })
            ->latest()
            ->get();

        // Ambil angkatan yang terkait dengan kelas yang diambil
        $angkatanIds = $kelas->pluck('angkatan_id')->unique(); // Ambil ID angkatan yang unik dari kelas
        $angkatan = ModelAngkatan::whereIn('id', $angkatanIds)->latest()->get(); // Ambil angkatan berdasarkan ID yang ada

        return view('livewire.jurusan.kelas', [
            'kelas' => $kelas,
            'angkatan' => $angkatan, // Kirim data angkatan ke view
        ]);
    }
}
