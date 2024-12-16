<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="section-header">
        <h1>Edit Kelas - {{ $kelas->nama }}</h1>
    </div>
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
                            <label for="angkatan_id" class="form-label">Angkatan</label>
                            <select wire:model="angkatan_id" id="angkatan_id" class="form-control @error('angkatan_id') is-invalid @enderror">
                                <option value="">-- Pilih Angkatan --</option>
                                @foreach($angkatan as $a)
                                    <option value="{{ $a->id }}">{{ $a->tahun }}</option>
                                @endforeach
                            </select>
                            @error('angkatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <a href="{{ route('jurusan.kelas', $jurusan->slug) }}" class="btn btn-light mr-2"><i class="fas fa-times"></i> BATAL</a>
                        <button type="submit" class="btn btn-primary">Update Kelas</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
