<?php

namespace App\Http\Controllers;

use App\Models\RuangKelas;
use Illuminate\Http\Request;

class RuangKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.ruang.index', [
            'title' => 'Daftar Kelas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.ruang.create', [
            'title' => 'Tambah Ruang Kelas'
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
    public function show(RuangKelas $ruangKelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RuangKelas $ruangKelas)
    {
        return view('dashboard.admin.ruang.edit', [
            'title' => 'Edit Ruang Kelas - ' . $ruangKelas->nama_ruang,
            'ruangkelas' => $ruangKelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RuangKelas $ruangKelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(RuangKelas $ruangKelas)
    {
        return view('dashboard.admin.ruang.delete', [
            'title' => 'Delete Ruang Kelas - ' . $ruangKelas->nama_ruang,
            'ruangkelas' => $ruangKelas
        ]);
    }
}
