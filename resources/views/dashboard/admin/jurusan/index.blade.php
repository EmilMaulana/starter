@extends('layouts.dashboard')

@section('content')
    <div class="section-header">
        <h1>Unit Akademik</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill custom-tabs">
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link active" id="tab-jurusan-link" href="#content-jurusan">Jurusan</a>
                        </li>
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link" id="tab-angkatan-link" href="#content-angkatan">Angkatan</a>
                        </li>
                    </ul>                    
                </div>     
            </div>
        </div>
    </div>


    {{-- Konten dinamis sesuai tab yang diklik --}}
    <div class="row">
        <div class="col-md-12" id="content-jurusan">
            @livewire('jurusan.index')
        </div>
        <div class="col-md-12 d-none" id="content-angkatan">
            @livewire('angkatan.index')
        </div>
    </div>


    <style>
        /* Default styling untuk tab hanya dalam konten */
        .custom-tabs .nav-link {
            background-color: #f8f9fa; /* background light untuk tab yang tidak aktif */
            color: #000; /* warna teks tab */
            transition: background-color 0.3s ease; /* animasi transisi ketika tab diubah */
        }

        /* Styling untuk tab yang aktif */
        .custom-tabs .nav-link.active {
            background-color: #007bff; /* background blue ketika aktif */
            color: #fff; /* warna teks putih saat aktif */
        }

        /* Styling untuk tab yang tidak aktif, default light */
        .custom-tabs .nav-link:not(.active) {
            background-color: #f5f5f5; /* background light ketika tidak aktif */
            color: #565656;
        }

        /* Menerapkan kelas d-none pada konten yang tidak aktif */
        .d-none {
            display: none;
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.nav-link');
            const contents = {
                'tab-jurusan-link': 'content-jurusan',
                'tab-angkatan-link': 'content-angkatan',
            };

            tabs.forEach(tab => {
                tab.addEventListener('click', function (e) {
                    // Cek apakah klik terjadi pada tab dan bukan elemen lainnya
                    if (e.target && e.target.classList.contains('nav-link')) {
                        // Pastikan tidak memblokir fungsi default (navigasi link)
                        e.preventDefault();

                        // Reset semua tab dan konten
                        tabs.forEach(item => item.classList.remove('active'));
                        Object.values(contents).forEach(id => document.getElementById(id).classList.add('d-none'));

                        // Aktifkan tab yang dipilih dan tampilkan konten
                        tab.classList.add('active');
                        document.getElementById(contents[tab.id]).classList.remove('d-none');
                    }
                });
            });
        });
    </script>
    {{-- @livewire('jurusan.index') --}}
@endsection