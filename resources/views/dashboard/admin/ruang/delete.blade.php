@extends('layouts.dashboard')

@section('content')
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    @livewire('ruang-kelas.delete', ['ruangkelas' => $ruangkelas])
@endsection