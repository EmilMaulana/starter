<div>
    {{-- Be like water. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content py-0">
                        <h6 class="text-uppercase bg-abu text-abu p-2 rounded text-center">Daftar Jurusan</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <a href="{{ route('jurusan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> TAMBAH</a>
                        <!-- Button trigger modal -->
                    </div>
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama Jurusan</th>
                                    <th>Kode Jurusan</th>
                                    <th>Slug</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($jurusan as $index => $jurusan)
                                <tr class="text-nowrap">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('jurusan.kelas', $jurusan->slug) }}" class="btn  btn-primary"><i class="fas fa-bars"></i></a>
                                        <a href="{{ route('jurusan.edit', $jurusan->slug) }}" class="btn  btn-info"><i class="fas fa-pen"></i></a>
                                        <a href="{{ route('jurusan.delete', $jurusan->slug) }}" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>    
                                    <td>{{ $jurusan->nama }}</td>
                                    <td>{{ strtoupper($jurusan->kode ?? 'N/A' ) }} </td>
                                    <td>{{ $jurusan->slug ?? 'N/A'}}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data jurusan ditemukan.</td>
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
