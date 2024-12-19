<?php

namespace App\Livewire\Kurikulum;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Mapel;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KurikulumExport;

class Index extends Component
{
    public $search = '';
    public $jurusanId;
    public $semester;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function export()
    {
        // Ambil nama jurusan dan semester
        $jurusan = Jurusan::find($this->jurusanId);
        $semesterName = $this->semester;

        // Format timestamp
        $timestamp = now()->format('Ymd_His');

        // Buat nama file
        $fileName = sprintf('%s_%s_%s.xlsx', 
            $jurusan ? $jurusan->nama : 'SEMUA_JURUSAN', 
            $semesterName ? $semesterName : 'SEMUA_SEMESTER', 
            $timestamp
        );

        return Excel::download(new KurikulumExport($this->search, $this->jurusanId, $this->semester), $fileName);

    }

    public function render()
    {
        $jurusan = Jurusan::latest()->get();
        // Ambil semester yang unik dari tabel mapel
        $semesters = Mapel::select('semester')->distinct()->get();
        $kurikulum = Mapel::with('jurusan')

        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('kode', 'like', '%' . $this->search . '%')
                    ->orWhereHas('jurusan', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
            });
        })
        ->when($this->jurusanId, function ($query) {
            $query->where('jurusan_id', $this->jurusanId); // Filter berdasarkan jurusan
        })
        ->when($this->semester, function ($query) {
            $query->where('semester', $this->semester); // Filter berdasarkan semester
        })
        ->orderBy('semester')
        ->paginate(20);

        return view('livewire.kurikulum.index', [
            'jurusan' => $jurusan,
            'kurikulums' => $kurikulum,
            'semesters' => $semesters,
        ]);
    }
}
