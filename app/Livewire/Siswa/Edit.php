<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Biodata;
use App\Models\Jurusan;
use App\Models\Angkatan;
use App\Models\Kelas;
USE App\Models\Status;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $biodata, $biodata_id, $user_id, $status_id, $name, $nis, $nisn, $agama, $jeniskelamin, $ttl, $alamat, $nohp, $jurusan_id, $angkatan_id, $kelas_id;
    // Method untuk mount komponen dengan data siswa berdasarkan ID
    public function mount(Biodata $biodata)
    {
        if (!$biodata) {
            session()->flash('error', 'Biodata tidak ditemukan.');
            return redirect()->route('siswa.index');
        }
        
        $this->biodata = $biodata;
        $this->biodata_id = $biodata->id;
        $this->user_id = $biodata->user_id;
        $this->status_id = $biodata->status_id;
        $this->name = $biodata->user->name;
        $this->nis = $biodata->nis;
        $this->nisn = $biodata->nisn;
        $this->agama = $biodata->agama;
        $this->jeniskelamin = $biodata->jeniskelamin;
        $this->ttl = $biodata->ttl;
        $this->alamat = $biodata->alamat;
        $this->nohp = $biodata->nohp;
        $this->jurusan_id = $biodata->jurusan_id;
        $this->angkatan_id = $biodata->angkatan_id;
        $this->kelas_id = $biodata->kelas_id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:50|unique:biodatas,nis,' . $this->biodata_id,
            'nisn' => 'required|string|max:50|unique:biodatas,nisn,' . $this->biodata_id,
            'agama' => 'required|string|max:50',
            'jeniskelamin' => 'required|string|max:10',
            'ttl' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string|max:15',
            'jurusan_id' => 'required|integer|exists:jurusans,id',
            'angkatan_id' => 'required|integer|exists:angkatans,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
            'status_id' => 'required|integer|exists:statuses,id',
        ]);

        try {
            DB::beginTransaction();

            // Update data pada tabel users
            $user = $this->biodata->user;
            $user->update([
                'name' => $this->name,
                'email' => strtolower(str_replace(' ', '.', $this->nis)) . '@siakad.com',
            ]);

            // Update data pada tabel biodata
            $this->biodata->update([
                'user_id' => $this->user_id,
                'nis' => $this->nis,
                'nisn' => $this->nisn,
                'agama' => $this->agama,
                'jeniskelamin' => $this->jeniskelamin,
                'ttl' => $this->ttl,
                'alamat' => $this->alamat,
                'nohp' => $this->nohp,
                'jurusan_id' => $this->jurusan_id,
                'angkatan_id' => $this->angkatan_id,
                'kelas_id' => $this->kelas_id,
                'status_id' => $this->status_id,
            ]);

            DB::commit();

            $this->reset();
            return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }




    public function render()
    {
        return view('livewire.siswa.edit', [
            'jurusan' => Jurusan::all(),
            'angkatan' => Angkatan::all(),
            'kelas' => Kelas::all(),
            'status' => Status::all(),
        ]);
    }
}
