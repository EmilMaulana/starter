<?php

namespace App\Livewire\RuangKelas;

use Livewire\Component;
use App\Models\RuangKelas as ModelRuangKelas;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $nama_ruang, $kapasitas, $deskripsi, $kode_ruang, $ruangkelas_id;

    public function mount(ModelRuangKelas $ruangkelas)
    {
        $this->ruangkelas_id = $ruangkelas->id; // Menyimpan ID untuk update data
        $this->nama_ruang = $ruangkelas->nama_ruang;
        $this->kapasitas = $ruangkelas->kapasitas;
        $this->deskripsi = $ruangkelas->deskripsi;
        $this->kode_ruang = $ruangkelas->kode_ruang;
    }

    public function update()
    {
        $this->validate([
            'nama_ruang' => 'required|string|max:255|unique:ruang_kelas,nama_ruang,' . $this->ruangkelas_id,
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        ModelRuangKelas::where('kode_ruang', $this->kode_ruang)->update([
            'nama_ruang' => $this->nama_ruang,
            'kapasitas' => $this->kapasitas,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('message', 'Data Ruang Kelas berhasil diubah!');

        return redirect()->route('ruangan.index');
    }

    public function render()
    {
        return view('livewire.ruang-kelas.edit');
    }
}
