<?php

namespace App\Livewire\Mapel;

use App\Models\Jurusan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mapel as ModelMapel;

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
