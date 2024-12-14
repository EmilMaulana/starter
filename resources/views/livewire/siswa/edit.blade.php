<div>
    {{-- Stop trying to control. --}}
    <div class="section-header">
        <h1>Edit Data {{ $biodata->user->name }} - {{ $biodata->nis }}</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" wire:model="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" placeholder="Masukkan NIS">
                            @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" wire:model="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="Masukkan NISN">
                            @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select wire:model="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <select wire:model="jeniskelamin" id="jeniskelamin" class="form-control @error('jeniskelamin') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jeniskelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
                            <input type="text" wire:model="ttl" id="ttl" class="form-control @error('ttl') is-invalid @enderror" placeholder="Masukkan tempat, tanggal lahir">
                            @error('ttl') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea wire:model="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap"></textarea>
                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="nohp" class="form-label">Nomor HP</label>
                            <input type="text" wire:model="nohp" id="nohp" class="form-control @error('nohp') is-invalid @enderror" placeholder="Masukkan nomor HP">
                            @error('nohp') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select wire:model="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status_id" class="form-label">Status</label>
                            <select wire:model="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror">
                                <option value="">-- Pilih Status --</option>
                                @foreach($status as $j)
                                    <option value="{{ $j->id }}">{{ $j->status }}</option>
                                @endforeach
                            </select>
                            @error('status_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                    </form>                                       
                </div>
            </div>
        </div>
    </div>
</div>
