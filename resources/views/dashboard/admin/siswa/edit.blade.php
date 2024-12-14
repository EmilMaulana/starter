@extends('layouts.dashboard')

@section('content')
    @livewire('siswa.edit', ['biodata' => $biodata])
@endsection