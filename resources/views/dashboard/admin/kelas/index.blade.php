@extends('layouts.dashboard')

@section('content')
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    @livewire('kelas.index')
@endsection