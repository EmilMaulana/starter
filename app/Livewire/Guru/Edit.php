<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru as ModelGuru;

class Edit extends Component
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

    public function update()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric|unique:gurus,nip,' . $this->id, // Pengecualian untuk NIP yang sama
            'jabatan' => 'required|string',
            'jeniskelamin' => 'nullable|string',
            'nohp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:500',
        ]);

        // Membuat email dari NIP
        $email = strtolower($this->nip) . '@example.com'; // Ganti dengan domain yang sesuai

        // Menentukan role_id berdasarkan jabatan
        switch ($this->jabatan) {
            case 'Kepala Sekolah':
                $role_id = 2;
                break;
            case 'Tata Usaha':
                $role_id = 3;
                break;
            case 'Wakasek Kurikulum':
                $role_id = 4;
                break;
            case 'Wakasek Kesiswaan':
                $role_id = 5;
                break;
            case 'Wakasek Sarana Prasarana':
                $role_id = 6;
                break;
            case 'Wakasek Hubungan Industri':
                $role_id = 7;
                break;
            case 'Wakasek Hubungan Masyarakat':
                $role_id = 8;
                break;
            case 'Ketua Jurusan':
                $role_id = 9;
                break;
            case 'Guru Praktikum':
            case 'Guru Teori':
                $role_id = 10;
                break;
            default:
                $role_id = null;
                break;
        }

        // Mengupdate data guru
        $guru = ModelGuru::where('id', $this->id)->first();
        if ($guru) {
            $guru->update([
                'nip' => $this->nip,
                'jabatan' => $this->jabatan,
                'jeniskelamin' => $this->jeniskelamin,
                'nohp' => $this->nohp,
                'alamat' => $this->alamat,
            ]);

            // Mengupdate data pengguna
            $user = $guru->user; // Mengambil pengguna terkait
            if ($user) {
                $user->name = $this->name;
                $user->email = $email; // Update email jika diperlukan
                $user->role_id = $role_id; // Update role_id
                $user->save(); // Simpan perubahan pengguna
            }

            session()->flash('message', 'Data Guru berhasil diubah!');
        } else {
            session()->flash('error', 'Data Guru tidak ditemukan.');
        }

        return redirect()->route('guru.index');

        // Reset form setelah menyimpan
        $this->reset();
    }


    public function render()
    {
        return view('livewire.guru.edit');
    }
}
