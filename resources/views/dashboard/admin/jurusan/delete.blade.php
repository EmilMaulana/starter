@extends('layouts.dashboard')

@section('content')
    @livewire('jurusan.delete', ['jurusan' => $jurusan])
@endsection