<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use App\Models\Jurusan as ModelJurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $jurusan;
    public $jurusanId;
    public $nama;
    public $kode;
    public $slug;

    public function mount(ModelJurusan $jurusan)
    {
        $this->jurusan = $jurusan;
        $this->nama = $jurusan->nama;
        $this->kode = $jurusan->kode;
        $this->slug = $jurusan->slug;
    }

    protected $rules = [
        'nama' => 'required|string|max:255',
        // 'kode' => 'required|string|max:50',
        // 'slug' => 'required|string|max:255|unique:jurusans,slug',
    ];

    protected function makeSlugUnique($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Cek apakah slug sudah ada di database
        while (ModelJurusan::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count; // Tambahkan sufiks
            $count++;
        }

        return $slug;
    }

    public function update()
    {
        $this->validate();

        // Menghasilkan slug dari nama jurusan
        $this->slug = Str::slug($this->nama);

        // Pastikan slug unik
        $this->slug = $this->makeSlugUnique($this->slug);

        $kode = $this->kode; // Ambil kode yang sudah ada

        // Jika kode kosong, generate kode baru
        if (empty($kode)) {
            $kode = $this->generateKodeJurusan();
        }

        // Update data jurusan
        $jurusan = $this->jurusan;
        $jurusan->update([
            'nama' => $this->nama,
            'kode' => $kode,
            'slug' => $this->slug,
        ]);

        // Reset input fields
        $this->reset(['nama', 'kode', 'slug']);

        // Menampilkan pesan sukses
        return redirect()->route('jurusan.index')->with('message', 'Data Jurusan berhasil diperbarui!');
    }

    private function generateKodeJurusan()
    {
        do {
            // Generate kode acak dengan panjang 8 karakter
            $kode = 'JRS-' . Str::random(6);
        } while (ModelJurusan::where('kode', $kode)->exists()); // Pastikan kode unik

        return $kode; // Kembalikan kode yang unik
    }

    
    public function render()
    {
        return view('livewire.jurusan.edit');
    }
}
