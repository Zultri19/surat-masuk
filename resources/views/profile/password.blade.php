@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <h4>Ganti Password</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4 shadow-sm">
        <form method="POST" action="{{ route('profile.password.update') }}">
            @csrf

            <div class="mb-3">
                <label>Password Lama</label>
                <input type="password"
                       name="current_password"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password"
                       name="new_password"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password"
                       name="new_password_confirmation"
                       class="form-control">
            </div>

            <button class="btn btn-danger">
                Ganti Password
            </button>
        </form>
    </div>

</div>
@endsection