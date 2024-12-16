<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.angkatan.index', [
            'title' => 'Daftar Angkatan'
        ]);
    }
}
