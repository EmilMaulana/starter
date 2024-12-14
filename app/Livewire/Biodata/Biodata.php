<?php

namespace App\Livewire\Biodata;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata as ModelBiodata;

class Biodata extends Component
{
    public $biodata;

    public function mount()
    {
        // Mengambil data biodata berdasarkan user yang login.  Asumsi:  kolom 'user_id' ada di tabel biodata
        $this->biodata = ModelBiodata::where('user_id', Auth::id())->first();

        // Jika tidak ada data biodata, tampilkan pesan atau lakukan tindakan lain
        if (!$this->biodata) {
            // Contoh:  menampilkan pesan error
            session()->flash('error', 'Data biodata belum tersedia.');
        }
    }

    public function render()
    {
        return view('livewire.biodata.biodata', [
            'biodata' => $this->biodata
        ]);
    }
}
