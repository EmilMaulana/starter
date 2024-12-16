<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content py-0">
                        <h6 class="text-uppercase bg-abu text-abu p-2 rounded text-center">Daftar Angkatan</h6>
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
                        <a href="#tambahAngkatan" class="btn btn-primary"><i class="fas fa-plus"></i> TAMBAH</a>
                        <!-- Button trigger modal -->
                    </div>
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Tahun Angkatan</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($angkatan as $index => $angkatan)
                                <tr class="text-nowrap">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="#tambahAngkatan" wire:click="edit({{ $angkatan->id }})" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                        {{-- <a href="{{ route('jurusan.kelas', $jurusan->slug) }}" class="btn  btn-primary"><i class="fas fa-bars"></i></a>
                                        <a href="{{ route('jurusan.edit', $jurusan->slug) }}" class="btn  btn-info"><i class="fas fa-pen"></i></a>
                                        <a href="{{ route('jurusan.delete', $jurusan->slug) }}" class="btn  btn-danger"><i class="fas fa-trash"></i></a> --}}
                                    </td>    
                                    <td>{{ $angkatan->tahun }}</td>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="tambahAngkatan">
                    <div class="col-md-6">

                        <form wire:submit.prevent="store">
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Angkatan</label>
                                <input type="text" id="tahun" wire:model="tahun" class="form-control" required>
                                @error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ $isEdit ? 'Perbarui Angkatan' : 'Tambah Angkatan' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
