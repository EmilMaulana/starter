@extends('layouts.dashboard')

@section('content')
    @livewire('jurusan.edit', ['jurusan' => $jurusan])
@endsection