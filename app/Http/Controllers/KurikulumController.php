<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.admin.kurikulum.index', [
            'title' => 'Daftar Kurikulum'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show( Jurusan $jurusan, Mapel $mapel)
    {
        return view('dashboard.admin.kurikulum.show', [
            'title' => $jurusan->nama . ' - ' . ucwords($mapel->nama),
            'mapel' => $mapel,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
