<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content py-0">
                        <h6 class="text-uppercase bg-abu text-abu p-2 rounded text-center">Biodata</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center border-top border-primary border-opacity-50 shadow rounded-top border-2">
                <div class="card-body">
                    <img 
                        src="{{ asset('assets/img/avatar/avatar-1.png') }}" 
                        alt="Gambar Person" 
                        class="rounded-circle img-thumbnail img-fluid profile-image" 
                        style="width: 100px" 
                    />
        
                    <h4 class="my-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ $biodata->nis ?? 'NULL' }}</p>
        
                    <button 
                        type="button" 
                        class="btn btn-danger btn-xs waves-effect mb-2 waves-light">
                        INFORMATIKA
                    </button>
                    <button 
                        type="button" 
                        class="btn btn-success btn-xs waves-effect mb-2 waves-light">
                        2022
                    </button>
        
                    <div class="text-center mt-3">
                        <h4 class="font-13 text-uppercase">Wali Kelas:</h4>
                        <p class="text-muted font-13 mb-3">Aji Primajaya, S.Si., M.Kom.</p>
                    </div>
        
                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger">
                                <i class="mdi mdi-google"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary">
                                <i class="mdi mdi-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="card border-top border-primary border-opacity-50 shadow rounded-top border-2">
                <div class="card-body">
                    <h4 class="header-title mb-4">Detail Mahasiswa</h4>
                
                    @if ($biodata)
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-id-badge mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>NISN</strong> <span class="text-muted">{{ $biodata->nisn ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-id-card mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>NIS</strong> <span class="text-muted">{{ $biodata->nis ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-envelope mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>Email</strong> <span class="text-muted">{{ Auth::user()->email ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-heart mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>Agama</strong> <span class="text-muted">{{ $biodata->agama ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-venus-mars mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>Jenis Kelamin</strong> <span class="text-muted">{{ $biodata->jeniskelamin ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-calendar-alt mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>TTL</strong> <span class="text-muted">{{ $biodata->ttl ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-map-marker-alt mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>Alamat</strong> <span class="text-muted">{{ $biodata->alamat ?? '-' }}</span>
                            </div>
                        </div>
                
                        <div class="d-flex align-items-start mt-3">
                            <i class="fas fa-phone mr-2 font-14 text-primary"></i>
                            <div class="w-100">
                                <strong>No HP</strong> <span class="text-muted">{{ $biodata->nohp ?? '-' }}</span>
                            </div>
                        </div>
                    @else
                        <p>Data biodata belum tersedia. Segera lakukan update data!</p>
                        <div class="">
                            <a href="{{ route('profile.edit') }}" class="btn btn-danger">
                                <i class="fas fa-pen"></i> PERBARUI DATA
                            </a>                            
                        </div>
                    @endif
                </div>                               
            </div>
        </div>        
    </div>
    @if (session()->has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('message') }}',
                    confirmButtonText: ' OK ',
                    customClass: {
                        confirmButton: 'btn btn-success',
                    },
                    buttonsStyling: false,
                });
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error', // Ubah ikon menjadi error
                    title: 'Terjadi Kesalahan!',
                    text: '{{ session('error') }}', // Tampilkan pesan error
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-danger',
                    },
                    buttonsStyling: false,
                });
            });
        </script>
    @endif
</div>
