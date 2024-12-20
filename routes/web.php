<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MapelController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.index    ');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/biodata-siswa', [BiodataController::class, 'index'])->name('biodata');
    Route::get('/akademik', [BiodataController::class, 'akademik'])->name('akademik');
    Route::get('/registrasi', [BiodataController::class, 'registrasi'])->name('registrasi');
    Route::get('/kurikulum', [BiodataController::class, 'kurikulum'])->name('kurikulum');

    Route::prefix('data-siswa')->name('siswa.')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('index');
        Route::get('/tambah', [SiswaController::class, 'create'])->name('tambah');
        Route::get('/import', [SiswaController::class, 'import'])->name('import');
        Route::get('/export', [SiswaController::class, 'export'])->name('export'); // Perbaikan untuk rute export
        Route::get('/{biodata:nis}/show', [SiswaController::class, 'show'])->name('show');
        Route::get('/{biodata:nis}/edit', [SiswaController::class, 'edit'])->name('edit');
    });

    Route::prefix('unit-akademik')->name('jurusan.')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('index');
        Route::get('/create', [JurusanController::class, 'create'])->name('create');
        Route::get('/{jurusan:slug}/edit', [JurusanController::class, 'edit'])->name('edit');
        Route::get('/{jurusan:slug}/kelas', [JurusanController::class, 'kelas'])->name('kelas');
        Route::get('/{jurusan:slug}/kelas/create', [JurusanController::class, 'createKelas'])->name('kelas.create');
        Route::get('/{jurusan:slug}/kelas/{kelas:id}/edit', [JurusanController::class, 'editKelas'])->name('kelas.edit');
        Route::get('/{jurusan:slug}/delete', [JurusanController::class, 'destroy'])->name('delete');
    });

    Route::prefix('ruang-kelas')->name('ruangan.')->group(function () {
        Route::get('/', [RuangKelasController::class, 'index'])->name('index');
        Route::get('/create', [RuangKelasController::class, 'create'])->name('create');
        Route::get('/{ruang_kelas:kode_ruang}/edit', [RuangKelasController::class, 'edit'])->name('edit');
        Route::get('/{ruang_kelas:kode_ruang}/delete', [RuangKelasController::class, 'delete'])->name('delete');
    });

    Route::prefix('data-guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/create', [GuruController::class, 'create'])->name('create');
        Route::get('/import', [GuruController::class, 'import'])->name('import');
        Route::get('/export', [GuruController::class, 'export'])->name('export');
        Route::get('/{guru:nip}/edit', [GuruController::class, 'edit'])->name('edit');
        Route::get('/{guru:nip}/delete', [GuruController::class, 'destroy'])->name('delete');
        
    });

    Route::prefix('mata-pelajaran')->name('mapel.')->group(function () {
        Route::get('/', [MapelController::class, 'index'])->name('index');
        Route::get('/create', [MapelController::class, 'create'])->name('create');
        Route::get('/import', [MapelController::class, 'import'])->name('import');
        Route::get('/export', [MapelController::class, 'export'])->name('export');
        Route::get('/{mapel:kode}/edit', [MapelController::class, 'edit'])->name('edit');
        Route::get('/{mapel:kode}/delete', [MapelController::class, 'destroy'])->name('delete');
        
    });

    Route::prefix('kurikulum')->name('kurikulum.')->group(function () {
        Route::get('/', [KurikulumController::class, 'index'])->name('index');
        Route::get('/create', [KurikulumController::class, 'create'])->name('create');
        Route::get('/import', [KurikulumController::class, 'import'])->name('import');
        Route::get('/export', [KurikulumController::class, 'export'])->name('export');
        Route::get('/{mapel:kode}/edit', [KurikulumController::class, 'edit'])->name('edit');
        Route::get('/{mapel:kode}/delete', [KurikulumController::class, 'destroy'])->name('delete');
        Route::get('/{jurusan:kode}/{mapel:kode}/show', [KurikulumController::class, 'show'])->name('show');

        
    });

    Route::prefix('manajemen-kelas')->name('kelas.')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('index');
        Route::get('/create', [KelasController::class, 'create'])->name('create');
        Route::get('/{kelas:kode}/edit', [KelasController::class, 'edit'])->name('edit');
        Route::get('/{kelas:kode}/siswa', [KelasController::class, 'siswa'])->name('siswa');
        Route::get('/{kelas:kode}/delete', [KelasController::class, 'destroy'])->name('delete');
        Route::get('/{kelas:kode}/siswa/create', [KelasController::class, 'createSiswa'])->name('siswa.create');
        Route::get('/{kelas:kode}/siswa/import', [KelasController::class, 'importSiswa'])->name('siswa.import');

        
    });

});

require __DIR__.'/auth.php';
