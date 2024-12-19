@extends('layouts.dashboard')

@section('content')
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    @livewire('kurikulum.show', ['mapel' => $mapel, 'jurusan' => $jurusan])
@endsection