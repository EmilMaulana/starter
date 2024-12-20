<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center mt-2">
                        <div class="col-md-5 mb-4">
                            <input type="text" id="search" class="form-control" placeholder="[ Cari Nama Kelas ]" wire:model.live="search">
                        </div>
                        <div class="col-md-3 mb-4 d-flex "> <!-- Menggunakan d-flex untuk sejajar -->
                            <a href="{{ route('kelas.create') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> TAMBAH</a>
                            <a href="{{ route('kelas.index') }}" class="btn btn-info"><i class="fas fa-sync"></i> REFRESH</a>
                        </div>
                    </div>                    
                    <div class="row justify-content-center">
                        <div class="col-md-5 mb-4">
                            <label for="search">Filter Angkatan</label>
                            <select wire:model.live="angkatan" id="angkatan" class="form-control text-center">
                                <option value=""> - Semua Angkatan - </option>
                                @foreach($angkatanList as $a)
                                    <option value="{{ $a->id }}">{{ $a->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-4">
                            <label for="search">Filter Jurusan</label>
                            <select wire:model.live="jurusanId" id="jurusanId" class="form-control text-center">
                                <option value=""> - Semua Jurusan - </option>
                                @foreach($jurusanList as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive my-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Ekstra</th>
                                    <th>Nama Kelas</th>
                                    <th>Kode Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Angkatan</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($kelass as $index => $kelasItem)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('kelas.siswa', $kelasItem->kode) }}" class="btn  btn-primary"><i class="fas fa-bars"></i></a>
                                            <a href="{{ route('kelas.edit', $kelasItem->kode) }}" class="btn btn-info">
                                                <i class="fas fa-pen"></i>
                                            </a>                                        
                                        </td>
                                        <td>{{ $kelasItem->nama ?? 'N/A'}}</td>
                                        <td>{{ strtoupper($kelasItem->kode ?? 'N/A') }}</td>
                                        <td>{{ $kelasItem->jurusan->nama ?? 'N/A'}}</td>
                                        <td>{{ $kelasItem->angkatan->tahun ?? 'N/A'}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada kelas yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        {{ $kelass->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
