<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.admin.guru.index', [
            'title' => 'Data Guru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.guru.create', [
            'title' => 'Tambah Data Guru'
        ]);
    }
    public function import()
    {
        return view('dashboard.admin.guru.import', [
            'title' => 'Import Data Guru',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('dashboard.admin.guru.edit', [
            'title' => 'Edit Data Guru - ' . $guru->user->name,
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        return view('dashboard.admin.guru.delete', [
            'title' => 'Delete Data Guru - ' . $guru->user->name,
            'guru' => $guru
        ]);
    }
}
