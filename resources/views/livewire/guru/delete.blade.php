<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="delete">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" wire:model="name" class="form-control" readonly>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" id="nip" wire:model="nip" class="form-control" readonly>
                            @error('nip') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select id="jabatan" wire:model="jabatan" class="form-select" disabled>
                                <option value="">Pilih Jabatan</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Wakasek Kurikulum">Wakasek Kurikulum</option>
                                <option value="Wakasek Kesiswaan">Wakasek Kesiswaan</option>
                                <option value="Wakasek Sarana Prasarana">Wakasek Sarana Prasarana</option>
                                <option value="Wakasek Hubungan Industri">Wakasek Hubungan Industri</option>
                                <option value="Wakasek Hubungan Masyarakat">Wakasek Hubungan Masyarakat</option>
                                <option value="Ketua Jurusan">Ketua Jurusan</option>
                                <option value="Guru Praktikum">Guru Praktikum</option>
                                <option value="Guru Teori">Guru Teori</option>
                            </select>
                            @error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <select id="jeniskelamin" wire:model="jeniskelamin" class="form-select" disabled>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jeniskelamin') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">Nomor HP</label>
                            <input type="text" id="nohp" wire:model="nohp" class="form-control" readonly>
                            @error('nohp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" wire:model="alamat" class="form-control" rows="3" readonly></textarea>
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> KONFIRMASI HAPUS</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
