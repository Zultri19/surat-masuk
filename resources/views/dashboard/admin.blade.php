@extends('layouts.admin')

@section('content')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')
<!-- <h3>Dashboard Admin</h3> -->

<div class="row">
    <div class="col-md-6">
        <div class="card shadow p-4">
            <h5>Total Surat Masuk</h5>
            <h2>{{ $totalSurat }}</h2>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow p-4">
            <h5>Total User</h5>
            <h2>{{ $totalUser }}</h2>
        </div>
    </div>
</div>
@endsection