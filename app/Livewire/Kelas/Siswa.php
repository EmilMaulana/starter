<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Siswa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $kelas;
    public $angkatanId;
    public $jurusanId;
    public $search = '';

    public function mount($kelas)
    {
        $this->kelas = $kelas; 

    }
    public function render()
    {
        $siswa = User::with('biodata.angkatan', 'biodata.jurusan', 'biodata.kelas')
            ->where('role_id', '=', 7) // Menambahkan kondisi untuk role_id
            ->when($this->angkatanId, function ($query) {
                $query->whereHas('biodata', function ($q) {
                    $q->where('angkatan_id', $this->angkatanId);
                });
            })
            ->when($this->jurusanId, function ($query) {
                $query->whereHas('biodata', function ($q) {
                    $q->where('jurusan_id', $this->jurusanId);
                });
            })
            ->when($this->kelas->id, function ($query) {
                $query->whereHas('biodata', function ($q) {
                    $q->where('kelas_id', $this->kelas->id);
                });
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    // Mencari berdasarkan nama atau nis
                    $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('biodata', function ($q) {
                        $q->where('nis', 'like', '%' . $this->search . '%');
                    });
                });
            })
            ->latest()->paginate(20);

        return view('livewire.kelas.siswa', [
            'siswas' => $siswa,
        ]);
    }
}
