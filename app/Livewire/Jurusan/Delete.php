<?php

namespace App\Livewire\Jurusan;

use Livewire\Component;
use App\Models\Jurusan as ModelJurusan;

class Delete extends Component
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

    public function delete()
    {
        $jurusan = ModelJurusan::where('slug', $this->slug)->first();

        if ($jurusan) {
            $jurusan->delete();
            session()->flash('message', 'Jurusan berhasil dihapus!');
            return redirect()->route('jurusan.index');
        } else {
            session()->flash('error', 'Jurusan tidak ditemukan!');
            return redirect()->route('jurusan.index');
        }
    }

    public function render()
    {
        return view('livewire.jurusan.delete');
    }
}
