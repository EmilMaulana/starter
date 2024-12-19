<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.admin.mapel.index', [
            'title' => 'Daftar Mata Pelajaran',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.mapel.create', [
            'title' => 'Tambah Mata Pelajaran',
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
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('dashboard.admin.mapel.edit', [
            'title' => 'Edit Mata Pelajaran - ' . $mapel->nama,
            'mapel' => $mapel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        //
    }

    public function import()
    {
        return view('dashboard.admin.mapel.import', [
            'title' => 'Import Mata Pelajaran',
        ]);
    }
}
