<?php

namespace App\Livewire\Mapel;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Mapel as ModelMapel;

class Edit extends Component
{
    public $nama;
    public $kode;
    public $jurusan_id;
    public $deskripsi; // Tambahkan properti untuk deskripsi
    public $jam; // Tambahkan properti untuk jam
    public $jenis; // Tambahkan properti untuk jenis
    public $jurusan; // Untuk menyimpan daftar jurusan
    public $semester; // Untuk menyimpan daftar jurusan

    public function mount(ModelMapel $mapel)
    {
        $this->jurusan = Jurusan::all(); // Ambil semua jurusan
        $this->nama = $mapel->nama;
        $this->kode = $mapel->kode;
        $this->jurusan_id = $mapel->jurusan_id;
        $this->deskripsi = $mapel->deskripsi;
        $this->jam = $mapel->jam;
        $this->jenis = $mapel->jenis;
        $this->semester = $mapel->semester;

    }

    public function update()
    {
        // Validasi data
        $this->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'nullable|string|max:10',
            'jurusan_id' => 'required|exists:jurusans,id',
            'deskripsi' => 'nullable|string|max:500', // Validasi deskripsi
            'jam' => 'required|integer|min:1', // Validasi jam
            'jenis' => 'required', // Validasi jenis
            'semester' => 'required|string|max:10', // Validasi semester
        ]);

        // Temukan mata pelajaran berdasarkan kode
        $mapel = ModelMapel::where('kode', $this->kode)->firstOrFail();

        // Update data mata pelajaran
        $mapel->update([
            'nama' => $this->nama,
            'jurusan_id' => $this->jurusan_id,
            'deskripsi' => $this->deskripsi,
            'jam' => $this->jam,
            'jenis' => $this->jenis,
            'semester' => $this->semester,
        ]);

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('mapel.index')->with('message', 'Mata pelajaran berhasil diperbarui!');
    }


    public function render()
    {
        return view('livewire.mapel.edit', [
            
        ]);
    }
}
