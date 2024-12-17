<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru as ModelGuru;
use App\Models\User as ModelUser;
use Livewire\WithPagination;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    public $search = ''; // Properti untuk menyimpan kata kunci pencarian
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function export()
    {
        // Mendapatkan timestamp saat ini
        $timestamp = now()->format('Ymd_His'); // Format: YYYYMMDD_HHMMSS
        $filename = "DATA_GURU_{$timestamp}.xlsx"; // Menambahkan timestamp ke nama file

        return Excel::download(new GuruExport(), $filename);
    }

    public function render()
    {

        $gurus = ModelUser::with('guru')
        ->where('role_id', '!=', 7) // Menambahkan kondisi untuk role_id
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                // Mencari berdasarkan nama atau NIP
                $q->where('name', 'like', '%' . $this->search . '%')
                ->orWhereHas('guru', function ($q) {
                    $q->where('nip', 'like', '%' . $this->search . '%');
                });
            });
        })
        ->latest()
        ->paginate(20);

        
        return view('livewire.guru.index', [
            'gurus' => $gurus,
        ]);
    }
}
