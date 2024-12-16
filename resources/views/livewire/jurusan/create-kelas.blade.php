<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="section-header">
        <h1>Tambah Kelas - Jurusan {{ $jurusan->nama }}</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kelas</label>
                            <input type="text" id="nama" wire:model="nama" class="form-control" required>
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        {{-- <div class="mb-3">
                            <label for="kode" class="form-label">Kode Kelas</label>
                            <input type="text" id="kode" wire:model="kode" class="form-control" required>
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> --}}
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
                    
                        <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
