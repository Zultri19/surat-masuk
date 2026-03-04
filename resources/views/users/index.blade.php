@extends('layouts.admin')

@section('content')

<div class="card shadow">
    <div class="card-header d-flex justify-content-between">
        <h5>Manajemen User</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            + Tambah User
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="120">Aksi</th>
            </tr>

            @foreach($users as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    <span class="badge bg-info">{{ $u->role }}</span>
                </td>
                <td>
                    {{-- Edit --}}
                    <a href="{{ route('users.edit', $u->id) }}"
                        class="btn btn-warning btn-sm"
                        title="Edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>



                    <form action="{{ route('users.destroy', $u->id) }}"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Yakin hapus data?')">
                          
                          @csrf
                          @method('DELETE')

                          <button type="submit"
                            class="btn btn-danger btn-sm"
                            title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                          </button>
                    </form>

                </td>
            </tr>
            @endforeach

        </table>

    </div>
</div>

@endsection