<?php

namespace App\Livewire\Mapel;

use Livewire\Component;
use App\Imports\MapelImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class Import extends Component
{
    use WithFileUploads;
    public $file;

    public function template()
    {   
        // Path file di folder public
        $templatePath = public_path('templates/TEMPLATE_MATA_PELAJARAN.xlsx');

        // Cek apakah file ada
        if (!file_exists($templatePath)) {
            // Berikan feedback jika file tidak ditemukan
            return redirect()->route('mapel.index')->with('error', 'Template tidak ditemukan!');
        }

        // Mendapatkan timestamp saat ini
        $timestamp = now()->format('Ymd_His'); // Format: YYYYMMDD_HHMMSS
        $filename = "TEMPLATE_MATA_PELAJARAN_{$timestamp}.xlsx"; // Menambahkan timestamp ke nama file

        // Download file
        return response()->download($templatePath, $filename);
    }

    public function import()
    {
        // Validasi file yang diupload
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            // Import file
            Excel::import(new MapelImport, $this->file->getRealPath());

            // Redirect dengan pesan sukses
            return redirect()->route('mapel.index')->with('message', 'Data mata pelajaran berhasil diimpor!');
        } catch (\Exception $e) {
            // Menangkap error dan menyimpannya ke session
            return redirect()->route('mapel.index')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        } finally {
            // Reset file input
            $this->reset('file');
        }
    }

    public function render()
    {
        return view('livewire.mapel.import');
    }
}
