<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\User;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kelas;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\SiswaExport;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $angkatanId;
    public $jurusanId;
    public $kelasId;
    public $search = '';

    public function render()
    {
        $angkatan = Angkatan::all();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        $siswa = User::with('biodata.angkatan', 'biodata.jurusan', 'biodata.kelas')
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
            ->when($this->kelasId, function ($query) {
                $query->whereHas('biodata', function ($q) {
                    $q->where('kelas_id', $this->kelasId);
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


        return view('livewire.siswa.index', [
            'angkatan' => $angkatan,
            'jurusan' => $jurusan,
            'kelas' => $kelas,
            'siswa' => $siswa,
        ]);
    }

    public function export()
    {
        // Mendapatkan timestamp saat ini
        $timestamp = now()->format('Ymd_His'); // Format: YYYYMMDD_HHMMSS
        $filename = "SISWA_{$timestamp}.xlsx"; // Menambahkan timestamp ke nama file

        return Excel::download(new SiswaExport($this->angkatanId, $this->jurusanId, $this->kelasId), $filename);
    }

}
