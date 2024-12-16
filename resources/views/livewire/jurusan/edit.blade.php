<div>
    {{-- Stop trying to control. --}}
    <div class="section-header">
        <h1>Edit {{ $jurusan->nama }}</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jurusan</label>
                            <input type="text" id="nama" wire:model="nama" class="form-control" autofocus required>
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Jurusan</label>
                            <input type="text" id="kode" wire:model="kode" class="form-control" readonly>
                            @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug Jurusan</label>
                            <input type="text" id="slug" wire:model="slug" class="form-control" readonly required>
                            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update Jurusan</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
