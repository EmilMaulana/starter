<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Biodata;

class Show extends Component
{
    public $biodata;
    public function mount(Biodata $biodata)
    {
        $this->biodata = $biodata;
    }
    public function render()
    {
        return view('livewire.siswa.show');
    }
}
