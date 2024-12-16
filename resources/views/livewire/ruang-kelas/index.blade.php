<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-4">
                        {{-- <a href="{{ route('ruangan.index') }}" class="btn btn-info mr-2"><i class="fas fa-arrow-left"></i> KEMBALI</a> --}}
                        <a href="{{ route('ruangan.create') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> TAMBAH</a>
                    </div>
                    
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruang</th>
                                    <th>Kode Ruang</th>
                                    <th>Kapasitas</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($ruangkelas as $index => $ruangkelas)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $ruangkelas->nama_ruang ?? 'N/A'}}</td>
                                        <td>{{ strtoupper($ruangkelas->kode_ruang ?? 'N/A') }}</td>
                                        <td>{{ $ruangkelas->kapasitas ?? 'N/A'}}</td>
                                        <td>{{ $ruangkelas->deskripsi ?? 'N/A'}}</td>
                                        <td>
                                            <a href="{{ route('ruangan.edit', $ruangkelas->kode_ruang) }}" class="btn btn-info">
                                                <i class="fas fa-pen"></i>
                                            </a>                                        
                                            <a href="{{ route('ruangan.edit', $ruangkelas->kode_ruang) }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>                                        
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada ruang kelas yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
