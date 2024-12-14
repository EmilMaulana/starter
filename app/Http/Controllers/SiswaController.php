<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.admin.siswa.index', [
            'title' => 'Data Siswa',
        ]);
    }

    public function import()
    {
        return view('dashboard.admin.siswa.import', [
            'title' => 'Import Data Siswa',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.siswa.tambah', [
            'title' => 'Tambah Data Siswa',
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
    public function show(Biodata $biodata)
    {
        return view('dashboard.admin.siswa.show', [
            'title' => 'Detail Data Siswa',
            'biodata' => $biodata,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biodata $biodata)
    {
        return view('dashboard.admin.siswa.edit', [
            'title' => 'Edit Data ' . $biodata->user->name,
            'biodata' => $biodata,
        ]);
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
