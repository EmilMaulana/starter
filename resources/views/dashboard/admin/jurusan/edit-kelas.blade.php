@extends('layouts.dashboard')

@section('content')
    @livewire('jurusan.edit-kelas', ['jurusan' => $jurusan, 'kelas' => $kelas])
@endsection