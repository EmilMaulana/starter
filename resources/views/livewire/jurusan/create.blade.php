<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="section-header">
        <h1>Tambah Jurusan</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jurusan</label>
                            <input type="text" id="nama" wire:model="nama" class="form-control" required>
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        {{-- <div class="mb-3">
                            <label for="kode" class="form-label">Kode Jurusan</label>
                            <input type="text" id="kode" wire:model="kode" class="form-control" required>
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> --}}
                    
                        <button type="submit" class="btn btn-primary">Tambah Jurusan</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
