@extends('layouts.dashboard')

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        Hi, Selamat Datang {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection