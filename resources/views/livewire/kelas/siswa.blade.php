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
                                    <td class="position-relative">
                                        @php
                                            $status = $siswa->biodata->status->status ?? 'N/A';
                                            $badgeClass = match ($status) {
                                                'Aktif' => 'badge text-white bg-success',
                                                'Tidak Aktif' => 'badge text-white bg-danger',
                                                'Cuti' => 'badge text-white bg-warning',
                                                'Lulus' => 'badge text-white bg-info',
                                                'Drop Out' => 'badge text-white bg-secondary',
                                                default => 'badge bg-light text-dark',
                                            };
                                        @endphp
                                    
                                        <!-- Badge dengan Dropdown -->
                                        <div class="dropdown">
                                            <span 
                                                class="{{ $badgeClass }} dropdown-toggle" 
                                                id="statusDropdown{{ $siswa->id }}" 
                                                data-bs-toggle="dropdown" 
                                                aria-expanded="false" 
                                                style="cursor: pointer;"
                                            >
                                                {{ strtoupper($status) }}
                                            </span>
                                            <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $siswa->id }}">
                                                <li>
                                                    <a 
                                                        class="dropdown-item text-success" 
                                                        href="#" 
                                                        wire:click.prevent="updateStatus('{{ $siswa->id }}', '1')"
                                                    >
                                                        Aktif
                                                    </a>
                                                </li>
                                                <li>
                                                    <a 
                                                        class="dropdown-item text-danger" 
                                                        href="#" 
                                                        wire:click.prevent="updateStatus('{{ $siswa->id }}', '2')"
                                                    >
                                                        Tidak Aktif
                                                    </a>
                                                </li>
                                                <li>
                                                    <a 
                                                        class="dropdown-item text-warning" 
                                                        href="#" 
                                                        wire:click.prevent="updateStatus('{{ $siswa->id }}', '3')"
                                                    >
                                                        Cuti
                                                    </a>
                                                </li>
                                                <li>
                                                    <a 
                                                        class="dropdown-item text-primary" 
                                                        href="#" 
                                                        wire:click.prevent="updateStatus('{{ $siswa->id }}', '4')"
                                                    >
                                                        Lulus
                                                    </a>
                                                </li>
                                                <li>
                                                    <a 
                                                        class="dropdown-item text-secondary" 
                                                        href="#" 
                                                        wire:click.prevent="updateStatus('{{ $siswa->id }}', '5')"
                                                    >
                                                        Drop Out
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
