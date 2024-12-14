<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $angkatanId;
    protected $jurusanId;
    protected $kelasId;

    public function __construct($angkatanId, $jurusanId, $kelasId)
    {
        $this->angkatanId = $angkatanId;
        $this->jurusanId = $jurusanId;
        $this->kelasId = $kelasId;
    }

    public function collection()
    {
        return User::with(['biodata.angkatan', 'biodata.jurusan', 'biodata.kelas'])
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
            ->get()
            ->map(function ($user) {
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'nis' => $user->biodata->nis ?? 'N/A',
                    'nisn' => $user->biodata->nisn ?? 'N/A',
                    'angkatan' => $user->biodata->angkatan->tahun ?? 'N/A',
                    'jurusan' => $user->biodata->jurusan->nama ?? 'N/A',
                    'kelas' => $user->biodata->kelas->nama ?? 'N/A',
                ];
            });
    }


    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Email',
            'NIS',
            'NISN',
            'Angkatan',
            'Jurusan',
            'Kelas',
        ];
    }
}
