<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Imports\SiswaImport;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads;
    public $file;

    public function template()
    {   
        // Path file di folder public
        $templatePath = public_path('templates/TEMPLATE_SISWA.xlsx');

        // Cek apakah file ada
        if (!file_exists($templatePath)) {
            // Berikan feedback jika file tidak ditemukan
            return redirect()->route('siswa.index')->with('error', 'Template tidak ditemukan!');
        }

        // Mendapatkan timestamp saat ini
        $timestamp = now()->format('Ymd_His'); // Format: YYYYMMDD_HHMMSS
        $filename = "TEMPLATE_SISWA_{$timestamp}.xlsx"; // Menambahkan timestamp ke nama file

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
            Excel::import(new SiswaImport, $this->file->getRealPath());

            // Redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil diimpor!');
        } catch (\Exception $e) {
            // Menangkap error dan menyimpannya ke session
            return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        } finally {
            // Reset file input
            $this->reset('file');
        }
    }


    public function render()
    {
        return view('livewire.siswa.import');
    }
}
