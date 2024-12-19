<?php

namespace App\Exports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KurikulumExport implements FromCollection, WithHeadings
{
    protected $search;
    protected $jurusanId;
    protected $semester;

    public function __construct($search, $jurusanId, $semester)
    {
        $this->search = $search;
        $this->jurusanId = $jurusanId;
        $this->semester = $semester;
    }

    public function collection()
    {
        $query = Mapel::with('jurusan');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('kode', 'like', '%' . $this->search . '%')
                    ->orWhereHas('jurusan', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
            });
        }

        if ($this->jurusanId) {
            $query->where('jurusan_id', $this->jurusanId);
        }

        if ($this->semester) {
            $query->where('semester', $this->semester);
        }

        return $query->get()->map(function ($kurikulum) {
            return [
                'Nama' => $kurikulum->nama,
                'Kode' => $kurikulum->kode,
                'Semester' => $kurikulum->semester,
                'Jam' => $kurikulum->jam,
                'Jurusan' => $kurikulum->jurusan->nama ?? 'N/A',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Mata Pelajaran',
            'Kode',
            'Semester',
            'Jam',
            'Jurusan',
        ];
    }
}
