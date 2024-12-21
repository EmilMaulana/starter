<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? 'SIAKAD' }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/prism/prism.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    {{-- font --}}
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
@stack('scripts')
@livewireStyles
</head>

<body class="badan">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        
                    </ul>
                    <div class="search-element">
                        
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" style="z-index: 10">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title" wire:poll.5s>
                                @if(session('login_time'))
                                    Logged in {{ \Carbon\Carbon::parse(session('login_time'))->diffForHumans() }}
                                @else
                                    Not logged in
                                @endif
                            </div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">SIAKAD</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/">LMS</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>                        
                        <li class="menu-header">DATA DASAR</li>
                        <li class="{{ request()->routeIs('biodata', 'profile.edit') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('biodata') }}"><i class="fas fa-users"></i> <span>Biodata Siswa</span></a>
                        </li> 
                        <li class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('siswa.index') }}"><i class="fas fa-user-graduate"></i> <span>Data Siswa</span></a>
                        </li>
                        <li class="{{ request()->routeIs('jurusan.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('jurusan.index') }}"><i class="fas fa-building"></i> <span>Unit Akademik</span></a>
                        </li>
                        <li class="{{ request()->routeIs('ruangan.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ruangan.index') }}"><i class="fas fa-chalkboard"></i> <span>Ruang Kelas</span></a>
                        </li>
                        <li class="{{ request()->routeIs('guru.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('guru.index') }}"><i class="fas fa-chalkboard-teacher"></i> <span>Data Guru</span></a>
                        </li>
                        <li class="menu-header">PRA PEMBELAJARAN</li>
                        <li class="{{ request()->routeIs('mapel.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('mapel.index') }}"><i class="fas fa-book"></i> <!-- Ikon untuk Mata Pelajaran --><span>Mata Pelajaran</span></a>
                        </li>
                        <li class="{{ request()->routeIs('kurikulum.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('kurikulum.index') }}"><i class="fas fa-th-list"></i> <!-- Ikon untuk Kurikulum --><span>Kurikulum</span></a>
                        </li>
                        <li class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('kelas.index') }}"><i class="fas fa-chalkboard-teacher"></i> <!-- Ikon untuk Manajemen Kelas --><span>Manajemen Kelas</span></a>
                        </li>                        
                        <li><a class="nav-link" href="blank.html"><i class="fas fa-user-plus"></i> <span>Registrasi</span></a></li>
                        <li><a class="nav-link" href="blank.html"><i class="fas fa-book-open"></i> <span>Rencana Studi</span></a></li>
                        <li class="menu-header">PEMBELAJARAN</li>
                        <li><a class="nav-link" href="blank.html"><i class="fas fa-calendar-alt"></i> <span>Jadwal Pembelajaran</span></a></li>
                        <li><a class="nav-link" href="blank.html"><i class="fas fa-graduation-cap"></i> <span>Hasil Studi</span></a></li>
                        <li class="menu-header">PKL</li>
                        <li><a class="nav-link" href="blank.html"><i class="fas fa-briefcase"></i> <span>Praktik Kerja Lapangan</span></a></li>

                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                        <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>        
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                    
                
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                Copyright &copy; 2024 <div class="bullet"></div> Developed By <a href="https://instagram.com/emilmaul_/" target="_blank">Emil Maulana</a>
                </div>
                <div class="footer-right">
                
                </div>
            </footer>
        </div>
    </div>

    <!-- Script untuk menampilkan modal -->
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

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index-0.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/prism/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

    


    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    @livewireScripts
</body>
</html>