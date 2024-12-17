<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-4">
                        <div class="row mt-2">
                            <!-- Search Section -->
                            <div class="col-md-4 my-1">
                                <label for="search">Cari Data</label>
                                <input type="text" id="search" class="form-control" placeholder="[ Nama Mapel - Kode Mapel - Jurusan ]" wire:model.live="search">
                            </div>
                            <div class="col-md-4 my-1">
                                <label for="search">Filter Jurusan</label>
                                <select wire:model.live="jurusanId" id="jurusan" class="form-control text-center">
                                    <option value=""> - Semua Jurusan - </option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Action Buttons -->
                            <div class="col-md-4 my-1">
                                <label for="actions">Aksi</label>
                                <div id="actions" class="d-flex flex-wrap">
                                    <a href="{{ route('mapel.create') }}" class="btn btn-primary m-1"><i class="fas fa-plus"></i> TAMBAH</a>
                                    {{-- <a href="{{ route('siswa.index') }}" class="btn btn-info m-1"><i class="fas fa-sync"></i> REFRESH</a> --}}
                                    <a href="{{ route('mapel.import') }}" class="btn btn-success m-1"><i class="fas fa-file-import"></i> IMPORT</a>
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
                                    <th>Mata Pelajaran</th>
                                    <th>Kode Mapel</th>
                                    <th>Jam</th>
                                    <th>Semester</th>
                                    <th>Jurusan</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($mapels as $index => $mapel) 
                                    <tr class="text-nowrap">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $mapel->nama ?? 'N/A' }}</td> 
                                        <td>{{ $mapel->kode ?? 'N/A' }}</td> 
                                        <td>{{ $mapel->jam ?? 'N/A' }}</td> 
                                        <td>{{ $mapel->semester ?? 'N/A' }}</td> 
                                        <td>{{ $mapel->jurusan->nama ?? 'N/A' }}</td> 
                                        <td>{{ ucwords($mapel->jenis ?? 'N/A') }}</td> 
                                        <td>
                                            <a href="{{ route('mapel.edit', $mapel->kode) }}" class="btn btn-info" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>                                        
                                            <a href="{{ route('mapel.delete', $mapel->kode) }}" class="btn btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>                                        
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center ">Tidak ada data mata pelajaran yang ditemukan.</td> <!-- Perbaiki pesan -->
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"> <!-- Tambahkan margin atas untuk pemisahan -->
                        {{ $mapels->links() }} <!-- Memanggil links() untuk pagination -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
