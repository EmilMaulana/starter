<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-4">
                        <div class="row mt-2">
                            <!-- Search Section -->
                            {{-- <div class="col-md-4 my-1">
                                <label for="search">Cari Data</label>
                                <input type="text" id="search" class="form-control" placeholder="[ Nama Mapel - Kode Mapel - Jurusan ]" wire:model.live="search">
                            </div> --}}
                            <div class="col-md-4 my-1">
                                <label for="search">Filter Jurusan</label>
                                <select wire:model.live="jurusanId" id="jurusan" class="form-control text-center">
                                    <option value=""> - Semua Jurusan - </option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 my-1">
                                <label for="semester">Filter Semester</label>
                                <select wire:model.live="semester" id="semester" class="form-control text-center">
                                    <option value=""> - Semua Semester - </option>
                                    @foreach($semesters as $s)
                                        <option value="{{ $s->semester }}">{{ ucwords($s->semester) }}</option> <!-- Pastikan ini menggunakan nama semester -->
                                    @endforeach
                                </select>
                            </div>                            
                            <!-- Action Buttons -->
                            <div class="col-md-4 my-1">
                                <label for="actions">Aksi</label>
                                <div id="actions" class="d-flex flex-wrap">
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
                                    <th>Ekstra</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Semester</th>
                                    <th>Jenis</th>
                                    <th>Jurusan</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($kurikulums as $index => $kurikulum) 
                                    <tr class="text-nowrap">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('kurikulum.show', ['jurusan' => $kurikulum->jurusan->kode, 'mapel' => $kurikulum->kode]) }}" class="btn btn-primary"><i class="fas fa-list"></i></a>
                                        </td> 
                                        <td>
                                            <div class="row align-items-center "> <!-- Menambahkan align-items-center untuk vertikal center -->
                                                <div class="col">
                                                    {{ $kurikulum->nama ?? 'N/A' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto"> <!-- Menggunakan col-auto untuk badge -->
                                                    <span class="badge badge-secondary">{{ $kurikulum->jam ?? 'N/A'}} Jam</span>
                                                    <span class="badge badge-info">{{ strtoupper($kurikulum->kode ?? 'N/A') }}</span>
                                                </div>
                                            </div>
                                        </td> 
                                        <td>{{ ucwords($kurikulum->semester ?? 'N/A') }}</td> 
                                        <td>{{ ucwords($kurikulum->jenis ?? 'N/A') }}</td> 
                                        <td>{{ $kurikulum->jurusan->nama ?? 'N/A' }}</td> 
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center ">Tidak ada data kurikulum yang ditemukan.</td> <!-- Perbaiki pesan -->
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"> <!-- Tambahkan margin atas untuk pemisahan -->
                        {{ $kurikulums->links() }} <!-- Memanggil links() untuk pagination -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
