<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.admin.kelas.index', [
            'title' => 'Manajemen Kelas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.kelas.create', [
            'title' => 'Tambah Kelas'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function siswa(Kelas $kelas)
    {
        return view('dashboard.admin.kelas.siswa', [
            'title' => 'Daftar Siswa - ' . ' Kelas ' . $kelas->nama . ' Angkatan ' . $kelas->angkatan->tahun,
            'kelas' => $kelas
        ]);
    }

    public function createSiswa(Kelas $kelas)
    {
        return view('dashboard.admin.kelas.siswa-create', [
            'title' => 'Tambah Data Siswa - ' . ' Kelas ' . $kelas->nama . ' Angkatan ' . $kelas->angkatan->tahun,
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        return view('dashboard.admin.kelas.edit', [
            'title' => 'Edit Kelas - ' . $kelas->nama,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
