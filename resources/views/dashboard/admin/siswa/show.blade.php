@extends('layouts.dashboard')

@section('content')
    @livewire('siswa.show', ['biodata' => $biodata])
@endsection