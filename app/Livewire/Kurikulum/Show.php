<?php

namespace App\Livewire\Kurikulum;

use App\Livewire\Biodata\Kurikulum;
use Livewire\Component;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kurikulum as ModelKurikulum;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectkelas;
    public $mapel;
    public $jurusan;
    public $kelasList;

    public function mount(Mapel $mapel, Jurusan $jurusan)
    {
        $this->jurusan = $jurusan;
        $this->mapel = $mapel;

        // Ambil kelas yang terikat dengan jurusan
        if ($this->mapel->jenis === 'wajib') {
            // Jika jenis mapel adalah wajib, ambil semua kelas
            $this->kelasList = Kelas::latest()->get(); // Mengambil semua kelas
        } else {
            // Jika tidak, ambil kelas yang terikat dengan jurusan
            $this->kelasList = Kelas::where('jurusan_id', $jurusan->id)->get();
        }

        // Ambil kelas yang sudah ditambahkan untuk mapel dan jurusan ini
        $addedKelasIds = ModelKurikulum::where('mapel_id', $this->mapel->id)
            ->pluck('kelas_id')
            ->toArray();

        // Hapus kelas yang sudah ditambahkan dari daftar kelas
        $this->kelasList = $this->kelasList->whereNotIn('id', $addedKelasIds);
    }


    public function store()
    {
        // Validasi input
        $this->validate([
            'selectkelas' => 'required|exists:kelas,id', // Pastikan kelas dipilih dan ada di tabel kelas
        ]);

        // Simpan data ke tabel kurikulum
        ModelKurikulum::create([
            'kelas_id' => $this->selectkelas,
            'mapel_id' => $this->mapel->id,
            'jurusan_id' => $this->jurusan->id, // Pastikan ID jurusan juga disimpan
        ]);

        // Tambahkan pesan sukses
        session()->flash('message', 'Data berhasil ditambahkan!');

        // Reset selectkelas setelah penyimpanan
        $this->selectkelas = null;

        // Memperbarui daftar kelas
        $this->mount($this->mapel, $this->jurusan); // Memanggil kembali mount untuk memperbarui daftar kelas
    }

    public function delete($id)
    {
        // Temukan kurikulum berdasarkan ID
        $kurikulum = ModelKurikulum::find($id);

        // Pastikan kurikulum ditemukan
        if ($kurikulum) {
            // Hapus kurikulum
            $kurikulum->delete();

            // Tambahkan pesan sukses
            session()->flash('error', 'Data berhasil dihapus!');
        } else {
            // Tambahkan pesan error jika tidak ditemukan
            session()->flash('error', 'Data tidak ditemukan!');
        }

        // Memperbarui daftar kurikulum
        $this->mount($this->mapel, $this->jurusan); // Memanggil kembali mount untuk memperbarui daftar
    }


    
    public function render()
    {
        // Ambil kurikulum yang sesuai dengan mapel dan jurusan yang dipilih
        $kurikulum = ModelKurikulum::where('mapel_id', $this->mapel->id)
            ->latest()
            ->paginate(10);

        return view('livewire.kurikulum.show', [
            'kurikulums' => $kurikulum,
            'kelas' => $this->kelasList, // Kirim daftar kelas ke tampilan
        ]);
    }
}
