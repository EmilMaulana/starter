<?php

namespace App\Exports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MapelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mapel::with('jurusan')->get()->map(function ($mapel) {
            return [
                'nama' => $mapel->nama,
                'kode' => $mapel->kode,
                'jam' => $mapel->jam,
                'semester' => $mapel->semester,
                'jenis' => $mapel->jenis,
                'jurusan' => $mapel->jurusan->nama ?? 'N/A',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Mata Pelajaran',
            'Kode',
            'Jam',
            'Semester',
            'Jenis',
            'Jurusan',
        ];
    }
}
