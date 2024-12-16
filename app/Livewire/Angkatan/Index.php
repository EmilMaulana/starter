<?php

namespace App\Livewire\Angkatan;

use App\Models\Angkatan as ModelAngkatan;
use Livewire\Component;
use Illuminate\Validation\ValidationException;


class Index extends Component
{
    public $tahun;
    public $angkatanId; // Untuk menyimpan ID angkatan saat update
    public $isEdit = false; // Menentukan apakah dalam mode edit

    public function render()
    {
        return view('livewire.angkatan.index', [
            'angkatan' => ModelAngkatan::latest()->get()
        ]);
    }

    public function mount($angkatanId = null)
    {
        if ($angkatanId) {
            $this->angkatanId = $angkatanId;
            $this->isEdit = true;
            $angkatan = ModelAngkatan::find($angkatanId);
            $this->tahun = $angkatan->tahun; // Ambil tahun untuk diisi di form
        }
    }

    public function edit($id)
    {
        $angkatan = ModelAngkatan::find($id);
        if ($angkatan) {
            $this->angkatanId = $angkatan->id;
            $this->tahun = $angkatan->tahun; // Isi tahun untuk form
            $this->isEdit = true; // Set mode edit
        }
    }

    public function store()
    {
        $this->validate([
            'tahun' => 'required|unique:angkatans,tahun,' .  $this->angkatanId // Contoh validasi tahun
        ]);

        if ($this->isEdit) {
            // Update angkatan
            $angkatan = ModelAngkatan::find($this->angkatanId);
            $angkatan->update(['tahun' => $this->tahun]);
            session()->flash('message', 'Data Angkatan berhasil diperbarui!');
        } else {
            // Create angkatan baru
            ModelAngkatan::create(['tahun' => $this->tahun]);
            session()->flash('message', 'Data Angkatan berhasil ditambahkan!');
        }

        // Reset input fields
        $this->reset(['tahun']);
        $this->isEdit = false; // Reset mode edit
        return redirect()->route('jurusan.index');
    }
}
