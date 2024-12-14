<div>
    {{-- Do your work, then step back. --}}
    <div class="section-header">
        <h1>Data Siswa</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center border-top border-primary border-opacity-50 shadow rounded-top border-2">
                <div class="card-body">
                    <img 
                        src="{{ asset('assets/img/avatar/avatar-1.png') }}" 
                        alt="Gambar Person" 
                        class="rounded-circle img-thumbnail img-fluid profile-image" 
                        style="width: 100px" 
                    />
        
                    <h4 class="my-1">{{ $biodata->user->name ?? '-' }}</h4>
                    <p class="text-muted">NIS: {{ $biodata->nis ?? 'NULL' }}</p>
        
                    <button 
                        type="button" 
                        class="btn btn-danger btn-xs waves-effect mb-2 waves-light">
                        {{ $biodata->jurusan->nama ?? 'Jurusan Tidak Tersedia' }}
                    </button>
                    <button 
                        type="button" 
                        class="btn btn-success btn-xs waves-effect mb-2 waves-light">
                        {{ $biodata->angkatan->tahun ?? 'Tahun Tidak Tersedia' }}
                    </button>
        
                    <div class="text-center mt-3">
                        <h4 class="font-13 text-uppercase">Wali Kelas:</h4>
                        <p class="text-muted font-13 mb-3">{{ $biodata->kelas->wali_kelas ?? 'Wali Kelas Tidak Tersedia' }}</p>
                    </div>
        
                    <div class="mt-3">
                        <p><i class="fas fa-id-badge mr-2 text-secondary"></i> NISN: {{ $biodata->nisn ?? '-' }}</p>
                        <p><i class="fas fa-chalkboard-teacher mr-2 text-secondary"></i> KELAS: {{ $biodata->kelas->nama ?? '-' }}</p>
                        <p><i class="fas fa-map-marker-alt mr-2 text-secondary"></i> Alamat: {{ $biodata->alamat ?? 'Alamat Tidak Tersedia' }}</p>
                        <p><i class="fas fa-phone mr-2 text-secondary"></i> Nomor HP: {{ $biodata->nohp ?? 'Tidak tersedia.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
