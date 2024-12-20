<div>
    {{-- Do your work, then step back. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded">
                <div class="card-body">
                    <div class="row mt-2">
                        <!-- Search Section -->
                        <div class="col-md-6 my-1">
                            <label for="search">Cari Data</label>
                            <input type="text" id="search" class="form-control" placeholder="[ Nama Lengkap - Nomor Induk Siswa ]" wire:model.live="search">
                        </div>
                    
                        <!-- Action Buttons -->
                        <div class="col-md-6 my-1">
                            <label for="actions">Aksi</label>
                            <div id="actions" class="d-flex flex-wrap">
                                <a href="{{ route('kelas.index') }}" class="btn btn-info m-1"><i class="fas fa-arrow-left"></i> KEMBALI</a>
                                <a href="{{ route('kelas.siswa.create', $kelas->kode) }}" class="btn btn-primary m-1"><i class="fas fa-plus"></i> TAMBAH</a>
                                <a href="{{ route('kelas.siswa.import', $kelas->kode) }}" class="btn btn-success m-1"><i class="fas fa-file-import"></i> IMPORT</a>
                                <button wire:click='export' class="btn btn-danger m-1"><i class="fas fa-file-export"></i> EXPORT</button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded">
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Angkatan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($siswas as $index => $siswa)
                                <tr class="text-nowrap">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $siswa->name }}</td>
                                    <td>{{ $siswa->email }}</td>
                                    <td>{{ $siswa->biodata->nis ?? 'N/A' }}</td>
                                    <td>{{ $siswa->biodata->nisn ?? 'N/A' }}</td>
                                    <td>{{ $siswa->biodata->angkatan->tahun ?? 'N/A' }}</td>
                                    <td>
                                        @php
                                            $status = $siswa->biodata->status->status ?? 'N/A';
                                            $badgeClass = '';
                                    
                                            switch ($status) {
                                                case 'Aktif':
                                                    $badgeClass = 'badge text-white bg-success'; // Hijau
                                                    break;
                                                case 'Tidak Aktif':
                                                    $badgeClass = 'badge text-white bg-danger'; // Merah
                                                    break;
                                                case 'Cuti':
                                                    $badgeClass = 'badge text-white bg-warning'; // Kuning
                                                    break;
                                                case 'Lulus':
                                                    $badgeClass = 'badge text-white bg-info'; // Biru
                                                    break;
                                                case 'Drop Out':
                                                    $badgeClass = 'badge text-white bg-secondary'; // Abu-abu
                                                    break;
                                                default:
                                                    $badgeClass = 'badge bg-light text-dark'; // Warna default
                                            }
                                        @endphp
                                    
                                        <span class="{{ $badgeClass }}">
                                            {{ strtoupper($status) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data siswa ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>    
                        </table>
                    </div>
                    <div class="">
                        {{ $siswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
