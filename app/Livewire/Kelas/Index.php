<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kelas as ModelKelas;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $angkatan; // Properti untuk menyimpan nilai angkatan
    public $jurusanId;
    public $angkatanList; // Properti untuk menyimpan daftar angkatan
    public $jurusanList; // Properti untuk menyimpan daftar angkatan
    public $search = '';

    public function mount()
    {
        // Ambil semua angkatan dari database
        $this->angkatanList = Angkatan::latest()->get();
        $this->jurusanList = Jurusan::latest()->get();
    }

    public function render()
    {
        // Ambil kelas berdasarkan angkatan, jurusan, dan pencarian
        $kelas = ModelKelas::when($this->angkatan, function ($query) {
            return $query->where('angkatan_id', $this->angkatan);
        })
        ->when($this->jurusanId, function ($query) {
            $query->whereHas('jurusan', function ($q) {
                $q->where('id', $this->jurusanId);
            });
        })
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                // Mencari berdasarkan nama
                $q->where('nama', 'like', '%' . $this->search . '%');
                // Jika Anda ingin menambahkan pencarian berdasarkan NIS, uncomment baris berikut
                // $q->orWhere('nis', 'like', '%' . $this->search . '%');
            });
        })
        ->latest()
        ->paginate(20);

        return view('livewire.kelas.index', [
            'kelass' => $kelas,
        ]);
    }
}
