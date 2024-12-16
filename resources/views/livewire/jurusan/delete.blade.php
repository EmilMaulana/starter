<div>
    {{-- Stop trying to control. --}}
    <div class="section-header">
        <h1>Delete {{ $jurusan->nama }}</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Konfirmasi Hapus Jurusan</h5>
                </div>
                <div class="card-body">
                    <p class="text-warning"><strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan. Pastikan Anda ingin menghapus jurusan ini.</p>
                    
                    <form wire:submit.prevent="delete">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jurusan</label>
                            <input type="text" id="nama" wire:model="nama" class="form-control" readonly>
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Jurusan</label>
                            <input type="text" id="kode" wire:model="kode" class="form-control" readonly>
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug Jurusan</label>
                            <input type="text" id="slug" wire:model="slug" class="form-control" readonly>
                            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('jurusan.index') }}" class="btn btn-light"><i class="fas fa-times"></i> Batal</a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus Jurusan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
