<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use App\Models\Jurusan as ModelJurusan;
use Illuminate\Support\Str;

class Create extends Component
{
    public $nama;
    public $kode;
    public $slug;

    protected $rules = [
        'nama' => 'required|string|max:255',
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

    private function generateKodeJurusan()
    {
        do {
            // Generate kode acak dengan panjang 8 karakter
            $kode = 'JRS-' . Str::random(6);
        } while (ModelJurusan::where('kode', $kode)->exists()); // Pastikan kode unik

        return $kode; // Kembalikan kode yang unik
    }

    public function store()
    {
        $this->validate();

        // Menghasilkan slug dari nama jurusan sebelum menyimpan
        $this->slug = Str::slug($this->nama);
        // Pastikan slug unik
        $this->slug = $this->makeSlugUnique($this->slug);

        // Generate kode kelas
        $kode = $this->generateKodeJurusan();

        ModelJurusan::create([
            'nama' => $this->nama,
            'kode' => $kode,
            'slug' => $this->slug,
        ]);

        // Reset input fields
        $this->reset(['nama', 'kode', 'slug']);

        // Optionally, you can emit an event or show a success message
        return redirect()->route('jurusan.index')->with('message', 'Data Jurusan berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.jurusan.create');
    }
}
