@extends('layouts.admin')
@section('content')
@section('page-title', 'Dashboard Operator')

<div class="card shadow p-4">
    <h5>Total Surat Masuk</h5>
    <h2>{{ $totalSurat }}</h2>
</div>
@endsection