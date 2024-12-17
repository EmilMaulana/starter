<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru as ModelGuru;

class Delete extends Component
{
    public $name;
    public $nip;
    public $jabatan;
    public $jeniskelamin;
    public $nohp;
    public $alamat;
    public $id;


    public function mount(ModelGuru $guru)
    {
        $this->name = $guru->user->name;
        $this->id = $guru->id;
        $this->nip = $guru->nip;
        $this->jabatan = $guru->jabatan;
        $this->jeniskelamin = $guru->jeniskelamin;
        $this->nohp = $guru->nohp;
        $this->alamat = $guru->alamat;
    }

    public function delete()
    {
        // Mencari guru berdasarkan ID
        $guru = ModelGuru::find($this->id);
        
        if ($guru) {
            // Menghapus pengguna terkait
            $user = $guru->user; // Mengambil pengguna terkait
            if ($user) {
                $user->delete(); // Menghapus pengguna
            }

            // Menghapus data guru
            $guru->delete();

            session()->flash('message', 'Data Guru berhasil dihapus!');
        } else {
            session()->flash('error', 'Data Guru tidak ditemukan.');
        }

        return redirect()->route('guru.index'); // Redirect setelah penghapusan
    }


    public function render()
    {
        return view('livewire.guru.delete');
    }
}
