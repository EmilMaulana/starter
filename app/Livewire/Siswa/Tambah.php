<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Jurusan as ModelJurusan;
use App\Models\Angkatan as ModelAngkatan;
use App\Models\Kelas as ModelKelas;
use App\Models\Biodata as ModelBiodata;
use App\Models\User as ModelUser;
use Illuminate\Support\Facades\Hash;


class Tambah extends Component
{
    public $name, $nis, $nisn, $agama, $jeniskelamin, $ttl, $alamat, $nohp, $jurusan_id, $angkatan_id, $kelas_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'nis' => 'required|numeric|unique:biodatas,nis',
        'nisn' => 'required|numeric|unique:biodatas,nisn',
        'agama' => 'required',
        'jeniskelamin' => 'required',
        'ttl' => 'nullable',
        'alamat' => 'nullable|string',
        'nohp' => 'nullable|numeric',
        'jurusan_id' => 'required|exists:jurusans,id',
        'angkatan_id' => 'required|exists:angkatans,id',
        'kelas_id' => 'required|exists:kelas,id',
    ];

    public function store()
    {
        $this->validate();

        // Simpan data ke tabel users
        $user = ModelUser::create([
            'name' => $this->name,
            'email' => strtolower(str_replace(' ', '.', $this->nis)) . '@siakad.com', // Email default
            'password' => Hash::make($this->nis), // Password default
        ]);

        // Simpan data ke tabel biodata
        ModelBiodata::create([
            'user_id' => $user->id, // Relasi ke tabel users
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
            'status_id' => '1',
        ]);

        // Reset input dan tampilkan notifikasi
        $this->reset();
        return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil ditambahkan!');
    }


    public function render()
    {
        return view('livewire.siswa.tambah', [
            'jurusan' => ModelJurusan::all(),
            'angkatan' => ModelAngkatan::all(),
            'kelas' => ModelKelas::all(),
        ]);
    }
}
