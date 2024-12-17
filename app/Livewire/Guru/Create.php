<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\User as ModelUser;
use App\Models\Guru as ModelGuru;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name;
    public $nip;
    public $jabatan;
    public $jeniskelamin;
    public $nohp;
    public $alamat;

    protected $rules = [
        'name' => 'required|string|max:255',
        'nip' => 'required|numeric|unique:gurus,nip',
        'jabatan' => 'required|string',
        'jeniskelamin' => 'nullable|string',
        'nohp' => 'nullable|string|max:15', // Sesuaikan dengan panjang nomor HP yang diinginkan
        'alamat' => 'nullable|string|max:500', // Sesuaikan dengan panjang alamat yang diinginkan
    ];

    public function store()
    {
        // Validasi input
        $this->validate();

        // Membuat email dari NIP
        $email = strtolower($this->nip) . '@example.com'; // Ganti dengan domain yang sesuai

        // Menentukan role_id berdasarkan jabatan
        switch ($this->jabatan) {
            case 'Kepala Sekolah':
                $role_id = 2; // Misalnya, 1 untuk Kepala Sekolah
                break;
            case 'Tata Usaha':
                $role_id = 3; // Misalnya, 2 untuk Wakasek Kurikulum
                break;
            case 'Wakasek Kurikulum':
                $role_id = 4; // Misalnya, 2 untuk Wakasek Kurikulum
                break;
            case 'Wakasek Kesiswaan':
                $role_id = 4; // Misalnya, 3 untuk Wakasek Kesiswaan
                break;
            case 'Wakasek Sarana Prasarana':
                $role_id = 4; // Misalnya, 4 untuk Wakasek Sarana Prasarana
                break;
            case 'Wakasek Hubungan Industri':
                $role_id = 4; // Misalnya, 5 untuk Wakasek Hubungan Industri
                break;
            case 'Wakasek Hubungan Masyarakat':
                $role_id = 4; // Misalnya, 5 untuk Wakasek Hubungan Industri
                break;
            case 'Ketua Jurusan':
                $role_id = 5; // Misalnya, 5 untuk Wakasek Hubungan Industri
                break;
            case 'Guru Praktikum':
                $role_id = 6; // Misalnya, 6 untuk Guru
                break;
            case 'Guru Teori':
                $role_id = 6; // Misalnya, 6 untuk Guru
                break;
            default:
                $role_id = null; // Atau bisa diatur ke nilai default
                break;
        }

        // Membuat pengguna baru
        $user = ModelUser::create([
            'name' => $this->name,
            'email' => $email,
            'password' => Hash::make($this->nip), // Menggunakan NIP sebagai password
            'role_id' => $role_id, // Menetapkan role_id
        ]);

        // Menyimpan data guru
        ModelGuru::create([
            'user_id' => $user->id, // Mengaitkan guru dengan pengguna yang baru dibuat
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
            'jeniskelamin' => $this->jeniskelamin,
        ]);

        return redirect()->route('guru.index')->with('message', 'Data guru berhasil ditambahkan!');
        // Reset form setelah menyimpan
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.guru.create');
    }
}
