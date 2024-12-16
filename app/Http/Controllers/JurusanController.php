<?php

namespace App\Http\Controllers;

// use App\Livewire\Jurusan\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\Kelas;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.jurusan.index', [
            'title' => 'Daftar Jurusan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.jurusan.create', [
            'title' => 'Tambah Jurusan'
        ]);
    }

    public function createKelas(Jurusan $jurusan)
    {
        return view('dashboard.admin.jurusan.create-kelas', [
            'title' => 'Tambah Kelas - Jurusan ' . $jurusan->nama,
            'jurusan' => $jurusan
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
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('dashboard.admin.jurusan.edit', [
            'title' => 'Edit Jurusan ' . $jurusan->nama,
            'jurusan' => $jurusan
        ]);
    }

    public function editKelas(Jurusan $jurusan, Kelas $kelas)
    {
        return view('dashboard.admin.jurusan.edit-kelas', [
            'title' => 'Edit Kelas - ' . $kelas->nama,
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ]);
    }

    public function kelas(Jurusan $jurusan)
    {
        return view('dashboard.admin.jurusan.kelas', [
            'title' => 'Daftar Kelas Jurusan ' . $jurusan->nama,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        return view('dashboard.admin.jurusan.delete', [
            'title' => 'Delete Jurusan ' . $jurusan->nama,
            'jurusan' => $jurusan
        ]);
    }
}
