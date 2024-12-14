<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Livewire\BiodataComponent;
use App\Livewire\AkademikComponent;
use App\Livewire\RegistrasiComponent;
use App\Livewire\KurikulumComponent;
use Livewire\Component;

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

    Route::get('/data-siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/data-siswa/{biodata:nis}/show', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/data-siswa/{biodata:nis}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::get('/data-siswa/tambah', [SiswaController::class, 'create'])->name('siswa.tambah');
    Route::get('/data-siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
    Route::get('/data-siswa/export', [SiswaController::class, 'index'])->name('siswa.export');

    Route::get('/unit-akademik', [JurusanController::class, 'index'])->name('jurusan.index');


});

require __DIR__.'/auth.php';
