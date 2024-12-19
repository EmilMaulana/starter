<?php

namespace App\Livewire\Mapel;

use App\Models\Jurusan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mapel as ModelMapel;
use App\Exports\MapelExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    public $search = '';
    public $jurusanId;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->jurusanId = null; // Inisialisasi dengan null
    }

    public function export()
    {
        // Mendapatkan timestamp saat ini
        $timestamp = now()->format('Ymd_His'); // Format: YYYYMMDD_HHMMSS
        $filename = "DATA_MATA_PELAJARAN_{$timestamp}.xlsx"; // Menambahkan timestamp ke nama file

        return Excel::download(new MapelExport(), $filename);
    }

    public function render()
    {
        $jurusan = Jurusan::latest()->get();
        $mapels = ModelMapel::with('jurusan')
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
        ->latest()
        ->paginate(20);

        return view('livewire.mapel.index', [
            'mapels' => $mapels,
            'jurusan' => $jurusan
        ]);
    }

    
}
