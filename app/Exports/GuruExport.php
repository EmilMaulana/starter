<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::with('user')->get()->map(function ($guru) {
            return [
                'name' => $guru->user->name, // Mengambil nama dari tabel users
                'nip' => $guru->nip,
                'email' => $guru->user->email, // Mengambil email dari tabel users
                'jabatan' => $guru->jabatan ?? 'N/A',
                'jeniskelamin' => $guru->jeniskelamin ?? 'N/A',
                'nohp' => $guru->nohp ?? 'N/A',
                'alamat' => $guru->alamat ?? 'N/A',
            ];
        });
    }
    

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIP',
            'Email',
            'Jabatan',
            'Jenis Kelamin',
            'No HP',
            'Alamat',
        ];
    }
}
