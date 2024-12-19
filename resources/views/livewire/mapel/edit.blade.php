<div>
    {{-- Stop trying to control. --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" wire:model="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama mata pelajaran">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Mata Pelajaran</label>
                            <input type="text" wire:model="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" readonly>
                            @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select wire:model="jurusan_id" id="jurusan" class="form-control @error('jurusan_id') is-invalid @enderror">
                                <option value=""> - Pilih Jurusan - </option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea wire:model="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi mata pelajaran"></textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="jam" class="form-label">Jam</label>
                            <input type="number" wire:model="jam" id="jam" class="form-control @error('jam') is-invalid @enderror" placeholder="Masukkan jumlah jam">
                            @error('jam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select wire:model="semester" id="semester" class="form-control @error('semester') is-invalid @enderror">
                                <option value=""> - Pilih Semester - </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            @error('semester') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select wire:model="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                <option value=""> - Pilih Jenis - </option>
                                <option value="wajib">Wajib</option>
                                <option value="teori">Teori</option>
                                <option value="praktik">Praktik</option>
                                <option value="teori dan praktik">Teori & Praktik</option>
                                <option value="tambahan">Tambahan</option>
                            </select>
                            @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
