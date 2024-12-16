@extends('layouts.dashboard')

@section('content')
    @livewire('jurusan.kelas', ['jurusan' => $jurusan])
@endsection