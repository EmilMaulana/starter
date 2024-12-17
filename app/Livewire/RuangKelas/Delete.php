<?php

namespace App\Livewire\RuangKelas;

use Livewire\Component;
use App\Models\RuangKelas as ModelRuangKelas;

class Delete extends Component
{
    public $nama_ruang, $kapasitas, $deskripsi, $kode_ruang;

    public function mount(ModelRuangKelas $ruangkelas)
    {
        $this->nama_ruang = $ruangkelas->nama_ruang;
        $this->kapasitas = $ruangkelas->kapasitas;
        $this->deskripsi = $ruangkelas->deskripsi;
        $this->kode_ruang = $ruangkelas->kode_ruang;
    }

    public function delete()
    {
        ModelRuangKelas::where('kode_ruang', $this->kode_ruang)->delete();

        return redirect()->route('ruangan.index')->with('message', 'Data ruang kelas berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.ruang-kelas.delete');
    }
}
