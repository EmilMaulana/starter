<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Kelas as ModelKelas;
use Illuminate\Support\Facades\Hash;


class SiswaCreate extends Component
{

    public $name, $nis, $nisn, $agama, $jeniskelamin, $ttl, $alamat, $nohp;

    public $angkatan_id;
    public $jurusan_id;
    public $kelas_id;
    public $kelas;

    public function mount(ModelKelas $kelas)
    {   
        $this->kelas= $kelas;
        $this->kelas_id = $kelas->id;
        $this->angkatan_id = $kelas->angkatan_id;
        $this->jurusan_id = $kelas->jurusan_id;

    }


    protected $rules = [
        'name' => 'required|string|max:255',
        'nis' => 'required|numeric|unique:biodatas,nis',
        'nisn' => 'required|numeric|unique:biodatas,nisn',
        'agama' => 'required',
        'jeniskelamin' => 'required',
        'ttl' => 'nullable',
        'alamat' => 'nullable|string',
        'nohp' => 'nullable|numeric'
    ];

    public function store()
    {
        $this->validate();

        // Simpan data ke tabel users
        $user = User::create([
            'name' => $this->name,
            'email' => strtolower(str_replace(' ', '.', $this->nis)) . '@siakad.com', // Email default
            'password' => Hash::make($this->nis), // Password default
        ]);

        // Simpan data ke tabel biodata
        Biodata::create([
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
        ]);

        // Reset input dan tampilkan notifikasi
        $this->reset();

        return redirect()->route('kelas.siswa', ['kelas' => $this->kelas->kode])->with('message', 'Data siswa berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.kelas.siswa-create');
    }
}
