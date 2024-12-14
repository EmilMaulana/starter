<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
        <p class="section-lead fw-semibold">
            Perbarui informasi pribadi Anda di halaman ini.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                <div class="profile-widget-header">                     
                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        {{-- <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div> --}}
                    </div>
                    <div class="profile-widget-item">
                        {{-- <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div> --}}
                    </div>
                    <div class="profile-widget-item">
                        {{-- <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div> --}}
                    </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ Auth::user()->name }} <div class="text-muted d-inline font-weight-normal"> </div></div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim eius illum provident. Ratione, ab ipsa dignissimos sunt illum harum obcaecati.
                </div>      
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form wire:submit.prevent="update" class="needs-validation" novalidate>
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Nama Lengkap">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" readonly id="email" wire:model="email" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nis">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" readonly id="nis" wire:model="nis" placeholder="NIS">
                                    @error('nis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nisn">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" readonly id="nisn" wire:model="nisn" placeholder="NISN">
                                    @error('nisn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="agama">Agama</label>
                                    <select class="form-control @error('agama') is-invalid @enderror" wire:model="agama" name="agama">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                        <!-- Tambahkan pilihan agama lainnya sesuai kebutuhan -->
                                    </select>
                                    @error('agama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jeniskelamin') is-invalid @enderror" wire:model="jeniskelamin" name="jeniskelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jeniskelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ttl">TTL</label>
                                    <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" wire:model="ttl" placeholder="TTL">
                                    @error('ttl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nohp">No HP</label>
                                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" wire:model="nohp" placeholder="No HP">
                                    @error('nohp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" wire:model="alamat" placeholder="Alamat"></textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>                                 
                </div>
            </div>
        </div>
    </div>
</div>
