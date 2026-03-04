@extends('layouts.admin')

@section('content')

<div class="card shadow">
    <div class="card-header">Edit User</div>

    <div class="card-body">

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name"
                       value="{{ $user->name }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ $user->email }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    @if(auth()->user()->role == 'admin')
                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="operator"
                            {{ $user->role == 'operator' ? 'selected' : '' }}>
                            Operator
                        </option>
                    @else
                        <option value="operator" selected>
                             Operator
                        </option>
                    @endif
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection