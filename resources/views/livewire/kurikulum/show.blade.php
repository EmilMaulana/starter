<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-primary text-center">
                    <span class="text-uppercase text-center">{{ session('message') }}</span>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger text-center">
                    <span class="text-uppercase text-center">{{ session('error') }}</span>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row justify-content-center align-items-center"> <!-- Menambahkan align-items-center untuk vertikal center -->
                            <div class="col-md-6 my-1">
                                <select wire:model.live="selectkelas" id="kelas" class="form-control text-center" required>
                                    <option value="">-- Pilih Kelas --</option> <!-- Opsi default -->
                                    @foreach($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center mt-1">
                            <div class="col-auto my-1"> <!-- Menggunakan col-auto untuk tombol -->
                                <a href="{{ route('kurikulum.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i> KEMBALI</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> TAMBAHKAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <table class="table table-striped rounded mb-0">
                            <thead class="table-bordered">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Kode Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                @forelse($kurikulums as $index => $kurikulum) 
                                    <tr class="text-nowrap">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kurikulum->kelas->nama ?? 'N/A' }}</td> 
                                        <td>{{ strtoupper($kurikulum->kelas->kode ?? 'N/A') }}</td> 
                                        <td>{{ $kurikulum->kelas->angkatan->tahun ?? 'N/A' }}</td>
                                        <td>
                                            <button wire:click="delete({{ $kurikulum->id }})" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center ">Tidak ada data kelas yang terkait dengan mata pelajaran ini.</td> <!-- Perbaiki pesan -->
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"> <!-- Tambahkan margin atas untuk pemisahan -->
                        {{ $kurikulums->links() }} <!-- Memanggil links() untuk pagination -->
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
</div>
