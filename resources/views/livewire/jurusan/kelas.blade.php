<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    
    <div class="section-header">
        <h1>Daftar Kelas - Jurusan {{ $jurusan->nama }}</h1>
    </div>
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content py-0">
                        <h6 class="text-uppercase bg-abu text-abu p-2 rounded text-center">Daftar Kelas - Jurusan {{ $jurusan->nama }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-3 mb-4">
                            <a href="{{ route('jurusan.index') }}" class="btn btn-info mr-2"><i class="fas fa-arrow-left"></i> KEMBALI</a>
                            <a href="{{ route('jurusan.kelas.create', $jurusan->slug) }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> TAMBAH</a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <select wire:model.live="angkatanId" id="angkatan" class="form-control text-center">
                                <option value=""> - Semua Angkatan - </option>
                                @foreach($angkatan as $a)
                                    <option value="{{ $a->id }}">{{ $a->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Kode Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($kelas as $index => $kelasItem)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kelasItem->nama ?? 'N/A'}}</td>
                                        <td>{{ strtoupper($kelasItem->kode ?? 'N/A') }}</td>
                                        <td>{{ $kelasItem->angkatan->tahun ?? 'N/A'}}</td>
                                        <td>
                                            <a href="{{ route('jurusan.kelas.edit', ['jurusan' => $jurusan->slug, 'kelas' => $kelasItem->id]) }}" class="btn btn-info">
                                                <i class="fas fa-pen"></i>
                                            </a>                                        
                                            {{-- <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada kelas yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script untuk menampilkan modal -->
    @if (session()->has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('message') }}',
                    confirmButtonText: ' OK ',
                    customClass: {
                        confirmButton: 'btn btn-success',
                    },
                    buttonsStyling: false,
                });
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error', // Ubah ikon menjadi error
                    title: 'Terjadi Kesalahan!',
                    text: '{{ session('error') }}', // Tampilkan pesan error
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-danger',
                    },
                    buttonsStyling: false,
                });
            });
        </script>
    @endif
</div>