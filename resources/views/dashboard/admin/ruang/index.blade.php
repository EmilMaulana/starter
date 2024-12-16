@extends('layouts.dashboard')

@section('content')
    <div class="section-header">
        <h1>Daftar Ruangan</h1>
    </div>
    @livewire('ruang-kelas.index')
@endsection