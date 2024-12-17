<div>
    {{-- Do your work, then step back. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-4">
                        <div class="row mt-2">
                            <!-- Search Section -->
                            <div class="col-md-6 my-1">
                                <label for="search">Cari Data</label>
                                <input type="text" id="search" class="form-control" placeholder="[ Nama Lengkap - Nomor Induk Pegawai ]" wire:model.live="search">
                            </div>
                        
                            <!-- Action Buttons -->
                            <div class="col-md-6 my-1">
                                <label for="actions">Aksi</label>
                                <div id="actions" class="d-flex flex-wrap">
                                    <a href="{{ route('guru.create') }}" class="btn btn-primary m-1"><i class="fas fa-plus"></i> TAMBAH</a>
                                    {{-- <a href="{{ route('siswa.index') }}" class="btn btn-info m-1"><i class="fas fa-sync"></i> REFRESH</a> --}}
                                    <a href="{{ route('guru.import') }}" class="btn btn-success m-1"><i class="fas fa-file-import"></i> IMPORT</a>
                                    <button wire:click='export' class="btn btn-danger m-1"><i class="fas fa-file-export"></i> EXPORT</button>
                                </div>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($gurus as $index => $guru) <!-- Perbaiki variabel dari $gurus menjadi $guru -->
                                    <tr class="text-nowrap">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $guru->name ?? 'N/A' }}</td> <!-- Menggunakan $guru -->
                                        <td>{{ $guru->email ?? 'N/A' }}</td> <!-- Menggunakan $guru -->
                                        <td>{{ $guru->guru->nip ?? 'N/A' }}</td> <!-- Menggunakan $guru -->
                                        <td>{{ strtoupper($guru->guru->jabatan ?? 'N/A') }}</td> <!-- Menggunakan $guru -->
                                        <td>
                                            <a href="{{ route('guru.edit', $guru->guru->nip) }}" class="btn btn-info" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>                                        
                                            <a href="{{ route('guru.delete', $guru->guru->nip) }}" class="btn btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>                                        
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center ">Tidak ada data guru yang ditemukan.</td> <!-- Perbaiki pesan -->
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"> <!-- Tambahkan margin atas untuk pemisahan -->
                        {{ $gurus->links() }} <!-- Memanggil links() untuk pagination -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
