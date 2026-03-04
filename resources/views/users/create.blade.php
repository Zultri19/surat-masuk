@extends('layouts.admin')

@section('content')

<div class="card shadow">
    <div class="card-header">Tambah User</div>

    <div class="card-body">

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    @if(auth()->user()->role == 'admin')
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    @else
                        <option value="operator">Operator</option>
                    @endif
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection