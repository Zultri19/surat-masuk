@php
use Illuminate\Support\Str;
@endphp
@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between">
        <h5>Data Surat Masuk</h5>

        <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary">
            + Tambah Surat
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori ID</th>
                    <th>Nomor Berkas</th>
                    <th>Alamat Pengirim</th>
                    <th>Tanggal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>File</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($surat as $s)
                <tr>
                    <td>{{ $loop->iteration + ($surat->currentPage() - 1) * $surat->perPage() }}</td>
                    <td>{{ $s->kategori_id }}</td>
                    <td>{{ $s->nomor_berkas }}</td>
                    <td>{{ $s->alamat_pengirim }}</td>
                    <td>{{ $s->tanggal_surat->format('d-m-Y') }}</td>
                    <td>{{ $s->nomor_surat }}</td>
                    <td title="{{ $s->perihal }}">{{ Str::limit($s->perihal, 50) }}</td>
                    <td title="{{ $s->file }}">{{ Str::limit($s->file, 50) }}</td>
                    <td class="text-center">
                        {{-- Preview --}}
                            <a href="{{ route('surat-masuk.show', $s->id) }}"
                                class="btn btn-info btn-sm"
                                title="Preview">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        
                        {{-- Edit --}}
                            <a href="{{ route('surat-masuk.edit', $s->id) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        
                        {{-- Hapus --}}
                        @if(auth()->user()->role == 'admin')
                            <form action="{{ route('surat-masuk.destroy', $s->id) }}"
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
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $surat->links() }}
    </div>
</div>

@endsection
