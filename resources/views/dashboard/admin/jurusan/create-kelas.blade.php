@extends('layouts.dashboard')

@section('content')
    @livewire('jurusan.create-kelas', ['jurusan' => $jurusan])
@endsection