<div>
    {{-- In work, do what you enjoy. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kelas</label>
                            <input type="text" id="nama" wire:model="nama" class="form-control" autofocus required>
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Kelas</label>
                            <input type="text" id="kode" wire:model="kode" class="form-control" readonly>
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jurusan_id" class="form-label">Jurusan</label>
                            <select wire:model="jurusan_id" id="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="angkatan_id" class="form-label">Angkatan</label>
                            <select wire:model="angkatan_id" id="angkatan_id" class="form-control @error('angkatan_id') is-invalid @enderror">
                                <option value="">-- Pilih Angkatan --</option>
                                @foreach($angkatan as $a)
                                    <option value="{{ $a->id }}">{{ $a->tahun }}</option>
                                @endforeach
                            </select>
                            @error('angkatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
