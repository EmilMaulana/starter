<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="section-header">
        <h1>Data Siswa</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="angkatan">Angkatan</label>
                            <select wire:model.live="angkatanId" id="angkatan" class="form-control text-center mb-2">
                                <option value=""> - Angkatan - </option>
                                @foreach($angkatan as $a)
                                    <option value="{{ $a->id }}">{{ $a->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jurusan">Jurusan</label>
                            <select wire:model.live="jurusanId" id="jurusan" class="form-control text-center mb-2">
                                <option value=""> - Jurusan - </option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kelas">Kelas</label>
                            <select wire:model.live="kelasId" id="kelas" class="form-control text-center">
                                <option value=""> - Kelas - </option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- Search Section -->
                        <div class="col-md-6 my-1">
                            <label for="search">Cari Data</label>
                            <input type="text" id="search" class="form-control" placeholder="[ Nama Lengkap - Nomor Induk Siswa ]" wire:model.live="search">
                        </div>
                    
                        <!-- Action Buttons -->
                        <div class="col-md-6 my-1">
                            <label for="actions">Aksi</label>
                            <div id="actions" class="d-flex flex-wrap">
                                <a href="{{ route('siswa.index') }}" class="btn btn-info m-1"><i class="fas fa-sync"></i> REFRESH</a>
                                <a href="{{ route('siswa.tambah') }}" class="btn btn-primary m-1"><i class="fas fa-plus"></i> TAMBAH</a>
                                <a href="{{ route('siswa.import') }}" class="btn btn-success m-1"><i class="fas fa-file-import"></i> IMPORT</a>
                                <button wire:click='export' class="btn btn-danger m-1"><i class="fas fa-file-export"></i> EXPORT</button>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded">
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-light">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($siswa as $index => $user)
                                <tr class="text-nowrap">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->biodata->nis ?? 'N/A' }}</td>
                                    <td>{{ $user->biodata->nisn ?? 'N/A' }}</td>
                                    <td>{{ $user->biodata->kelas->nama ?? 'N/A' }}</td>
                                    <td>{{ $user->biodata->angkatan->tahun ?? 'N/A' }}</td>
                                    <td>{{ $user->biodata->jurusan->nama ?? 'N/A' }}</td>
                                    <td>
                                        @php
                                            $status = $user->biodata->status->status ?? 'N/A';
                                            $badgeClass = '';
                                    
                                            switch ($status) {
                                                case 'Aktif':
                                                    $badgeClass = 'badge text-white bg-success'; // Hijau
                                                    break;
                                                case 'Tidak Aktif':
                                                    $badgeClass = 'badge text-white bg-danger'; // Merah
                                                    break;
                                                case 'Cuti':
                                                    $badgeClass = 'badge text-white bg-warning'; // Kuning
                                                    break;
                                                case 'Lulus':
                                                    $badgeClass = 'badge text-white bg-info'; // Biru
                                                    break;
                                                case 'Drop Out':
                                                    $badgeClass = 'badge text-white bg-secondary'; // Abu-abu
                                                    break;
                                                default:
                                                    $badgeClass = 'badge bg-light text-dark'; // Warna default
                                            }
                                        @endphp
                                    
                                        <span class="{{ $badgeClass }}">
                                            {{ strtoupper($status) }}
                                        </span>
                                    </td>                                    
                                    <td>
                                        <a href="{{ route('siswa.show', $user->biodata->nis ?? '') }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('siswa.edit', $user->biodata->nis ?? '') }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data siswa ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>    
                        </table>
                    </div>
                    <div class="">
                        {{ $siswa->links() }}
                    </div>
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